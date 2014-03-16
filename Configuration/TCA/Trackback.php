<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_t3blog_trackback'] = array (
    'ctrl' => $TCA['tx_t3blog_trackback']['ctrl'],
    'interface' => array (
        'showRecordFieldList' => 'hidden,fromurl,text,title,postid,id'
    ),
    'feInterface' => $TCA['tx_t3blog_trackback']['feInterface'],
    'columns' => array (
        'hidden' => array (
            'exclude' => 1,
            'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config'  => array (
                'type'    => 'check',
                'default' => '0'
            )
        ),
        'fromurl' => Array (
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_trackback.fromurl',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
                'max' => '100',
                'eval' => 'trim',
            )
        ),
        'text' => Array (
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_trackback.text',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
                'max' => '255',
                'eval' => 'trim',
            )
        ),
        'title' => Array (
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_trackback.title',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
                'max' => '50',
                'eval' => 'trim',
            )
        ),
        'blogname' => Array (
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_trackback.blogname',
            'config' => Array (
                'type' => 'input',
                'size' => '30',
                'max' => '50',
                'eval' => 'trim',
            )
        ),
        'postid' => Array (
            'exclude' => 1,
            'label' => 'LLL:EXT:t3extblog/Resources/Private/Language/locallang_db.xml:tx_t3blog_trackback.postid',
            'config' => Array (
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_t3blog_post',
                'size' => 1,
                'minitems' => 0,
                'maxitems' => 1,
				'prepend_tname' => FALSE,
            )
        ),
    ),
    'types' => array (
        '0' => array('showitem' => 'hidden;;1;;1-1-1, fromurl, text, title;;;;2-2-2, postid;;;;3-3-3, id')
    ),
    'palettes' => array (
        '1' => array('showitem' => '')
    )
);

?>