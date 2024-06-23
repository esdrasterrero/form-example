<?php
namespace Drupal\form_example\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\form_example\DateServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DateForm extends FormBase
{

  /**
   * The date service.
   *
   * @var \Drupal\form_example\DateServiceInterface
   */
  protected $dateService;

  /**
   * The logger service.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactoryInterface
   */
  protected $loggerFactory;

  /**
   * Constructs a new DateForm.
   *
   * @param \Drupal\Core\Logger\LoggerChannelFactoryInterface $logger_factory
   *   The logger factory.
   */
  public function __construct(LoggerChannelFactoryInterface $logger_factory, DateServiceInterface $date_service) {
    $this->loggerFactory = $logger_factory;
    $this->dateService = $date_service;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('logger.factory'),
      $container->get('form_example.date')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'example_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['date_textfield'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Date text'),
      '#description' => $this->t('Enter a date. You can use the following formats: mm-dd-yyyy (e.g., 12-31-2024), yyyy-mm-dd (e.g., 2024-12-31), dd/mm/yyyy (e.g., 31/12/2024), or Month Day, Year (e.g., December 31, 2024).'),
      '#required' => TRUE,
    ];

    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date picker'),
      '#description' => $this->t('Choose a date from the date picker.'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Assign form values related to dates to an array.
    $fieldValues = [
      'date_textfield' => $form_state->getValue('date_textfield'),
      'date' => $form_state->getValue('date'),
    ];

    // Iterate and validate the $fieldValues array.
    foreach ($fieldValues as $formElementName => $value) {
      if (empty($value)) {
        $form_state->setErrorByName(
          $formElementName,
          $this->t($form[$formElementName]['#title'] . ' field is required.')
        );
      } elseif (!strtotime($value)) {
        $form_state->setErrorByName(
          $formElementName,
          $this->t($form[$formElementName]['#title'] . ' field must be a valid date.')
        );
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $textField = $form_state->getValue('date_textfield');
    $dateField = $form_state->getValue('date');

    // Log the submitted data.
    $this->loggerFactory->get('form_example')->info('Date Textfield day: @textfield, Date picker day: @datefield', [
      '@textfield' => $this->dateService->getDayOfWeek($textField),
      '@datefield' => $this->dateService->getDayOfWeek($dateField),
    ]);

    $this->messenger()->addMessage($this->t('Form submitted successfully.'));
  }

}
