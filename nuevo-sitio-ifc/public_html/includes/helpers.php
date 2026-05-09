<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
function e($v){return htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');}
function csrf_token(){if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
function csrf_valid($t){return isset($_SESSION['csrf'])&&hash_equals($_SESSION['csrf'],(string)$t);} 
function clean($v,$m){$v=trim(strip_tags(str_replace(["\r","\n","%0a","%0d"],' ',$v)));return mb_substr($v,0,$m);} 
function rate_limit_ok(){ $k='contact_rate'; $now=time(); $_SESSION[$k]=$_SESSION[$k]??[]; $_SESSION[$k]=array_filter($_SESSION[$k],fn($t)=>$t>$now-600); if(count($_SESSION[$k])>=5) return false; $_SESSION[$k][]=$now; return true; }
