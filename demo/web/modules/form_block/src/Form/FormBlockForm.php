<?php
/**
 * @file
 * Contains \Drupal\form_block\Form\FormBlockForm
 */
namespace Drupal\form_block\Form;
use Drupal\Core\Database\Database;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class FormBlockForm extends FormBase{


  /**
   * {@inheritdoc}
   */

  public function getFormId()
  {
   return 'form_block_form';
  }


  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['name'] = array(
      '#title'=>'Name',
      '#type'=> 'textfield',
      '#required'=> TRUE,
    );
    $form['rating'] = array(
      '#title'=> 'Rating',
      '#type'=> 'radios',
      '#options'=>array(
        'Very Bad'=>'0',
        'Bad'=>'1',
        'Ok'=>'3',
        'Good'=>'4',
        'Excellent'=>'5'
      ),
      '#required'=> TRUE,
    );
    $form['save'] = array(
      '#type'=> 'submit',
      '#value'=> 'Send Feedback',
      '#button_type'=> 'primary'
    );
      return $form;
  }

  /**
   * operations performing upon submitting
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $postData = $form_state->getValues();//getting values from the form.
    unset($postData['save'],$postData['form_build_id'],$postData['form_token'],$postData['form_id'],$postData['op']);//unsetting unnecessary fields.
    $query = \Drupal::database();
    $query->insert('nameAndRatings')->fields($postData)->execute();//inserting data to db
    $this->messenger()->addMessage('Your Feedback Saved Successfully');//success message
  }
}
