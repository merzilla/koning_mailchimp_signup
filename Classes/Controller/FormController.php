<?php
namespace Keizer\KoningMailchimpSignup\Controller;

use Keizer\KoningMailchimpSignup\Domain\Model\Subscriber;
use Keizer\KoningMailchimpSignup\Domain\Model\SubscriberList;
use Keizer\KoningMailchimpSignup\Utility\ConfigurationUtility;

/**
 * Controller: Form
 *
 * @package Keizer\KoningMailchimpSignup\Controller
 */
class FormController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var \Keizer\KoningMailchimpSignup\Domain\Repository\SubscriberListRepository
     * @inject
     */
    protected $subscriberListRepository;

    /**
     * @var \Keizer\KoningMailchimpSignup\Domain\Repository\SubscriberRepository
     * @inject
     */
    protected $subscriberRepository;

    /**
     * Show MailChimp registration form
     *
     * @return void
     * @throws \Exception
     */
    public function showAction()
    {
        if (!class_exists('\DrewM\MailChimp\MailChimp')) {
            throw new \Exception('MailChimp API wrapper not found. Run composer require drewm/mailchimp-api to install it.');
        }

        if (!ConfigurationUtility::isValid()) {
            throw new \Exception('MailChimp settings not found. Check the Extension Manager for configuring the settings.');
        }

        if (!isset($this->settings['data']['list']) || !ctype_digit($this->settings['data']['list'])) {
            throw new \Exception('No MailChimp list selected: check plugin configuration.');
        }
    }

    /**
     * Create MailChimp subscriber
     *
     * @param \Keizer\KoningMailchimpSignup\Domain\Model\Subscriber $subscriber
     * @validate $subscriber NotEmpty, \Keizer\KoningMailchimpSignup\Validation\Validator\UniqueSubscriptionValidator
     * @return void
     */
    public function createAction($subscriber)
    {
        /** @var SubscriberList $list */
        $list = $this->subscriberListRepository->findByUid($this->settings['data']['list']);
        if ($list !== null) {
            $subscriber->setList($list);
            $this->subscriberRepository->add($subscriber);

            if (isset($this->settings['data']['successPid']) && (int) $this->settings['data']['failedPid'] > 0) {
                $url = $this->uriBuilder->reset()->setTargetPageUid($this->settings['data']['successPid'])->build();
                $this->redirectToUri($url);
            } else {
                $this->redirect('success');
            }
        } else {
            if (isset($this->settings['data']['failedPid']) && (int) $this->settings['data']['failedPid'] > 0) {
                $url = $this->uriBuilder->reset()->setTargetPageUid($this->settings['data']['failedPid'])->build();
                $this->redirectToUri($url);
            } else {
                $this->redirect('failed');
            }
        }
    }

    /**
     * Shown when the sign up was successful
     *
     * @return void
     */
    public function successAction()
    {
    }

    /**
     * Shown when the provided list does not exist (anymore)
     *
     * @return void
     */
    public function failedAction()
    {
    }
}
