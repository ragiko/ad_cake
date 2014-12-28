<?php
App::uses('AppModel', 'Model');

/**
 * Article Model
 *
 * @property Xvideo $Xvideo
 */
class Article extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'video_nummber' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'xvideo_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'photo' => array (
            // 'rule' => 'isSuccessfulWrite',
            // 'message' => 'File was unsuccessfully written to the server'
        ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Xvideo' => array(
			'className' => 'Xvideo',
			'foreignKey' => 'xvideo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    // 参考: http://tagamidaiki.com/cakephp2-upload-plugin-upload/
    public $actsAs = array(
        'Upload.Upload' => array(
            'photo' => array(
                'fields' => array(
                    'dir' => 'photo_dir'
                ),
                'thumbnailSizes' => array(
                    'thumb150' => '150x150',
                    'normal' => '200x200',
                    'big' => '500x500'
                ),
                'thumbnailMethod' => 'php'
            )
        ),
        'Tags.Taggable' => array(
            'unsetInAfterFind' => true
        )
    );

}
