<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:koning_mailchimp_signup/Resources/Private/Language/locallang_be.xlf:tx_koningmailchimpsignup_domain_model_subscriber.singular',
        'groupName' => 'LLL:EXT:koning_mailchimp_signup/Resources/Private/Language/locallang_be.xlf:tx_koningmailchimpsignup_domain_model_subscriber.plural',
        'label' => 'email',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'editlock' => 'editlock',
        'dividers2tabs' => true,
        'iconfile' => 'EXT:koning_mailchimp_signup/Resources/Public/Icons/tx_koningmailchimpsignup_domain_model_subscriber.png',
        'rootLevel' => true,
        'canNotCollapse' => true,
        'hideTable' => false,
        'security' => array(
            'ignoreWebMountRestriction' => true,
            'ignoreRootLevelRestriction' => true,
        ),
        'readOnly' => true
    ),
    'interface' => array(
        'showRecordFieldList' => 'email, list, first_name, last_name, salutation'
    ),
    'types' => array(
        0 => array(
            'showitem' => 'email, list, first_name, last_name, salutation'
        )
    ),
    'palettes' => array(),
    'columns' => array(
        'email' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_mailchimp_signup/Resources/Private/Language/locallang_be.xlf:tx_koningmailchimpsignup_domain_model_subscriber.email',
            'config' => array(
                'type' => 'input',
                'size' => 30,
            )
        ),
        'list' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_mailchimp_signup/Resources/Private/Language/locallang_be.xlf:tx_koningmailchimpsignup_domain_model_subscriber.list',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'tx_koningmailchimpsignup_domain_model_subscriberlist'
            ),
        ),
        'first_name' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_mailchimp_signup/Resources/Private/Language/locallang_be.xlf:tx_koningmailchimpsignup_domain_model_subscriber.first_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
            )
        ),
        'last_name' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_mailchimp_signup/Resources/Private/Language/locallang_be.xlf:tx_koningmailchimpsignup_domain_model_subscriber.last_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
            )
        ),
        'salutation' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:koning_mailchimp_signup/Resources/Private/Language/locallang_be.xlf:tx_koningmailchimpsignup_domain_model_subscriber.salutation',
            'config' => array(
                'type' => 'input',
                'size' => 30,
            )
        ),
    ),
);
