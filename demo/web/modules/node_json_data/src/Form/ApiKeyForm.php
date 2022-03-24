<?php

/**
 * @file
 * Contains \Drupal\node_json_data\Form\ApiKeyForm
 */
namespace Drupal\node_json_data\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ApiKeyForm extends ConfigFormBase{


  /**
   * {@inheritdoc}
   */

  public function getFormId()
  {
    return 'node_json_data';
  }


  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $config = $this->config('node_json_data.settings');
    $form['apiKey'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Api Key'),
      '#required' => TRUE,

    );
    return parent::buildForm($form, $form_state);
  }


  /**
   * {@inheritdoc}
   */

  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    parent::validateForm($form, $form_state);

    if(strlen($form_state->getValue('apiKey')) > 16){
      $form_state->setErrorByName('apiKey', ('The apiKey is not valid.'));
      return;
    }

  }


  /**
   * {@inheritdoc}
   * creating configuration named node_json_data.settings;
   */

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    parent::submitForm($form, $form_state);
    $config = $this->config('node_json_data.settings');

    $config->set('node_json_data.api', $form_state->getValue('apiKey'));

    $config->save();

  }


  /**
   * {@inheritdoc}
   */

  protected function getEditableConfigNames()
  {

    return [

      'node_json_data.settings',

    ];
  }
}
