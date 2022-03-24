<?php
/**
 * @file
 * contains \Drupal\form_block\Plugin\Block\FormBlockBlock
 */
namespace Drupal\formblock\Plugin\Block;
use Drupal\Core\Block\BlockBase;


/**
 * Provides form block
 * @block(
 *   id = "form_block_block",
 *   admin_label = @Translation("Form Block"),
 *   )
 */

class FormblockBlock extends BlockBase{

  /**
   *{@inheritDoc}
   */

  public function build()
  {
    return \Drupal::formBuilder()->getForm('Drupal\formblock\Form\FormblockForm');
  }

}

