<?php

class EActiveFinder extends CActiveFinder {
	private $_joinCount = 0;
	private $_joinTree;
	private $_builder;

	public function __construct($model,$with) {
		$this->_builder=$model->getCommandBuilder();
		$this->_joinTree=new CJoinElement($this,$model);
		$this->buildJoinTree($this->_joinTree,$with);
	}

	public function createCommand($criteria) {
		//workaround for selecting i.e. ARRAY[col_name, col_name2]
		$select = $criteria->select;
		$criteria->select = "*";

		$query = new CJoinQuery($this->_joinTree, $criteria);
		$this->_joinTree->buildQuery($query);
		if (!empty($select))
			$query->selects = array($select);
		return $query->createCommand($this->_builder);
	}

	//copied parent class method from Yii source code
	private function buildJoinTree($parent,$with,$options=null) {
		if($parent instanceof CStatElement)
			throw new CDbException(Yii::t('yii','The STAT relation "{name}" cannot have child relations.',
				array('{name}'=>$parent->relation->name)));

		if(is_string($with))
		{
			if(($pos=strrpos($with,'.'))!==false)
			{
				$parent=$this->buildJoinTree($parent,substr($with,0,$pos));
				$with=substr($with,$pos+1);
			}

			// named scope
			$scopes=array();
			if(($pos=strpos($with,':'))!==false)
			{
				$scopes=explode(':',substr($with,$pos+1));
				$with=substr($with,0,$pos);
			}

			if(isset($parent->children[$with]) && $parent->children[$with]->master===null)
				return $parent->children[$with];

			if(($relation=$parent->model->getActiveRelation($with))===null)
				throw new CDbException(Yii::t('yii','Relation "{name}" is not defined in active record class "{class}".',
					array('{class}'=>get_class($parent->model), '{name}'=>$with)));

			$relation=clone $relation;
			$model=CActiveRecord::model($relation->className);

			if($relation instanceof CActiveRelation)
			{
				$oldAlias=$model->getTableAlias(false,false);
				if(isset($options['alias']))
					$model->setTableAlias($options['alias']);
				elseif($relation->alias===null)
					$model->setTableAlias($relation->name);
				else
					$model->setTableAlias($relation->alias);
			}

			if(!empty($relation->scopes))
				$scopes=array_merge($scopes,(array)$relation->scopes); // no need for complex merging

			if(!empty($options['scopes']))
				$scopes=array_merge($scopes,(array)$options['scopes']); // no need for complex merging

			$model->resetScope(false);
			$criteria=$model->getDbCriteria();
			$criteria->scopes=$scopes;
			$model->beforeFindInternal();
			$model->applyScopes($criteria);

			// select has a special meaning in stat relation, so we need to ignore select from scope or model criteria
			if($relation instanceof CStatRelation)
				$criteria->select='*';

			$relation->mergeWith($criteria,true);

			// dynamic options
			if($options!==null)
				$relation->mergeWith($options);

			if($relation instanceof CActiveRelation)
				$model->setTableAlias($oldAlias);

			if($relation instanceof CStatRelation)
				return new CStatElement($this,$relation,$parent);
			else
			{
				if(isset($parent->children[$with]))
				{
					$element=$parent->children[$with];
					$element->relation=$relation;
				}
				else
					$element=new CJoinElement($this,$relation,$parent,++$this->_joinCount);
				if(!empty($relation->through))
				{
					$slave=$this->buildJoinTree($parent,$relation->through,array('select'=>false));
					$slave->master=$element;
					$element->slave=$slave;
				}
				$parent->children[$with]=$element;
				if(!empty($relation->with))
					$this->buildJoinTree($element,$relation->with);
				return $element;
			}
		}

		// $with is an array, keys are relation name, values are relation spec
		foreach($with as $key=>$value)
		{
			if(is_string($value))  // the value is a relation name
				$this->buildJoinTree($parent,$value);
			elseif(is_string($key) && is_array($value))
				$this->buildJoinTree($parent,$key,$value);
		}
	}
}

