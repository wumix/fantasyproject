<?php
  function getUserTotalScore($userid){
      $consumed = \App\UserPointsConsumed::where('user_id',$userid)->sum('points_consumed');
      $scored = \App\UserPointsScored::where('user_id', $userid)->sum('points_scored');
      if( $scored-$consumed>=0){
          return $scored-$consumed;
      }
      return 0;
  }

?>