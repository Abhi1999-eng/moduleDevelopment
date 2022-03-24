<?php
/**
 * @file
 * Contains \Drupal\node_json_data\Controller\ShowJsonDataController
 */
namespace Drupal\node_json_data\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

class ShowJsonDataController extends ControllerBase{


/**
 * Fucntion to show data
 */

public function showData($api,$nid){
  $config_api = \Drupal::config('node_json_data.settings')
  ->get('node_json_data.api');

  $values = \Drupal::entityQuery('node')
  ->condition('nid', $nid)
  ->execute();

  $node_exists = !empty($values);
  if((($api == $config_api) and ($node_exists))  ){
    $result = array(
      'API KEY'=> $api,
      'Node ID'=>$nid,
    );

    return new JsonResponse($result);

  }

  return new JsonResponse(('Invalid Api Key or Node ID'));

}

}
