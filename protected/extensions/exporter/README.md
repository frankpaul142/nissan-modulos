yii-exporter
============

This extension provides a grid widget called CsvView that allows output a large dataset in a CSV format.

Because it inherits from the CGridView widget, column configuration from other actions __can be reused__.

Exports are streamed, so it's __fast__ and __doesn't run out of memory__ with large files. Eager loading by setting the 'with' property of CDbCriteria in the dataProvider __is__ supported.

The grid is __easily extendable__ which helps creating new export formats. See the provided JsonView as an example. This is intended for custom XML exports.

##Requirements

Tested in Yii 1.1.13 and above.

No external dependencies.

##Usage

Extract to extensions/exporter directory. See the CsvView and ExportAction classes for all options reference.

###Single action

By using the provided ExportAction class an action for downloading files with exported data could be created by defining in the controller:

~~~php
public function actions() {
    return array(
        'export' => array(
            'class'     => 'ext.exporter.ExportAction',
            'columns'   => $this->getIndexColumns(), // reuse existing configuration
            'modelClass' => 'SomeModel', // provide your CActiveRecord model with the search() method or define 'dataProvider' in the 'widget' property
            'widget'    => array('filename' => 'export.csv'), // all properties of CsvView widget
        ),
    );
}
~~~


###Creating file on the server side

Create a widget and capture it's contents:

~~~php
$widget = Yii::app()->widgetFactory->createWidget($controller, 'ext.exporter.CsvView', array(
    'columns' => $columns, // reuse existing configuration
    'dataProvider' => $model->search(), // or create it any other way
	'disableBuffering' => false,
	'disableHttpHeaders' => true,
));
ob_start();
ob_implicit_flush(false);
$widget->run();
$file_contents = ob_get_clean();
~~~

###Extending

See the provided JsonView class for an example how to create new export formats. In many cases just three methods need to be overwritten:

* renderHeader
* renderBody
* renderFooter

##Resources

 * [Project page](https://github.com/nineinchnick/yii-exporter)


