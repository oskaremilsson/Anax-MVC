<?php
/**
 * Theme related functions. 
 *
 */

/**
* Get a gravatar based on the user's email.
*/
function get_gravatar($size=null, $email) {
  return 'http://www.gravatar.com/avatar/' . md5(strtolower($email)) . '.jpg?d=404&' . ($size ? "s=$size" : null);
}