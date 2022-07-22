<?php

function filterReq($req){

  return htmlspecialchars(strip_tags($_POST[$req]));

}