<?php
namespace Keizer\KoningMailchimpSignup\Domain\Model;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Model: Subscriber
 *
 * @package Keizer\KoningMailchimpSignip\Domain\Model
 */
class Subscriber extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @lazy
     * @var \Keizer\KoningMailchimpSignup\Domain\Model\SubscriberList
     */
    protected $list;

    /**
     * @var string
     * @validate EmailAddress
     */
    protected $email;

    /**
     * @var string $firstName
     * @validate NotEmpty
     */
    protected $firstName;

    /**
     * @var string $lastName
     * @validate NotEmpty
     */
    protected $lastName;

    /**
     * @var string $salutation
     */
    protected $salutation;

    /**
     * @return SubscriberList
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param SubscriberList $list
     * @return void
     */
    public function setList(SubscriberList $list)
    {
        $this->list = $list;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = strtolower($email);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param string $salutation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = LocalizationUtility::translate('salutation_' . intval($salutation), 'koningMailchimpSignup');
    }

}
