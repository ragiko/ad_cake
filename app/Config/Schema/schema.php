<?php 
class AppSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}


    var $articles = array(
        'id' => array(
            'type' => 'integer',
            'null' => false,
            'default' => null,
            'key' => 'primary',
            'extra' => 'auto_increment',
        ),
        'title' => array(
            'type' => 'string',
            'null' => false,
            'default' => null,
            'length' => 255,
        ),
        'date' => array(
            'type' => 'datetime',
            'null' => false,
            'default' => null,
        ),
        'video_nummber' => array(
            'type' => 'integer',
            'null' => false,
            'default' => null,
        ),
        'xvideo_id' => array(
            'type' => 'integer',
            'null' => false,
            'default' => null,
        ),
        'target_domain' => array(
            'type' => 'string',
            'null' => true,
            'default' => null,
            'length' => 255,
        ),
        'created' => array(
            'type' => 'datetime',
            'null' => false,
            'default' => null,
        ),
        'modified' => array(
            'type' => 'datetime',
            'null' => false,
            'default' => null,
        ),
        'indexes' => array(
            'PRIMARY' => array(
                'column' => 'id',
                'unique' => true,
            ),
        ),
    );

    var $xvideos = array(
        'id' => array(
            'type' => 'integer',
            'null' => false,
            'default' => null,
            'key' => 'primary',
        ),
        'vote' => array(
            'type' => 'integer',
            'null' => false,
            'default' => null,
        ),
        'view' => array(
            'type' => 'integer',
            'null' => false,
            'default' => null,
        ),
        'time' => array(
            'type' => 'time',
            'null' => false,
            'default' => null,
        ),
        'created' => array(
            'type' => 'datetime',
            'null' => false,
            'default' => null,
        ),
        'modified' => array(
            'type' => 'datetime',
            'null' => false,
            'default' => null,
        ),
        'indexes' => array(
            'PRIMARY' => array(
                'column' => 'id',
                'unique' => true,
            ),
        ),
    );
}
