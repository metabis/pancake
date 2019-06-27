<?php
define('IN_QUOTE', true);

include('./common.php');
include('./includes/page_header.'.$phpEx);

if ($userdata['user_login'])
{
	if (isset($_GET['login']))
	{
		if ($_GET['login'] == 'logout')
		{
			$sql = 'DELETE FROM ' . SESSIONS_TABLE . " WHERE session_id='$session_id';";
			if( !($db->query($sql)) )
			{
				message_die(__LINE__, __FILE__, $sql);
			}
			else
			{
				if (session_destroy())
				{
					error_message($lang['Message'], $lang['Logout_good']);
				}
				else
				{
					error_message($lang['Message'], $lang['Logout_bad']);
				}
			}
		} 
	}
	else {
		error_message($lang['Message'], $lang['Already_connected']);
	}
}
else if (!$userdata['user_login'])
{
	if (isset($_POST['username']) && isset($_POST['password']))
	{
		$pseudo = $_POST['username'];
		$pseudo = htmlspecialchars(clear_quote($pseudo), ENT_QUOTES);
		$pseudo = str_replace('<', '&lt;', $pseudo);
		$pseudo = str_replace('>', '&gt;', $pseudo);
		$password = $_POST['password'];
		$_POST = array();
		$errormessage = '';
		if (($pseudo == '' ) || ($password == '' ))
		{
			if ($pseudo == '' )
			{
				$errormessage .= $lang['No_username_specified'] . '<br />';
			}
	
			if ($password == '' )
			{
				$errormessage .= $lang['No_password_specified'] . '<br />';
			}
			error_message($lang['Message'], $errormessage, LOGIN_URL);
		} else {
			$sql = "SELECT *
				FROM " . USERS_TABLE . "
				WHERE LOWER(username) = '" . strtolower($pseudo) . "'";
			if( !($res = $db->query($sql)) )
			{
				message_die(__LINE__, __FILE__, $sql);
			}
			else
			{
				$user_exist = FALSE;
				while ($array = $db->fetcharray($res))
				{
					if ($array['username'] == $pseudo)
					{
						$user_exist = TRUE;
						$regdate = $array['user_regdate'];
						$user_id = $array['user_id'];
					}
				}
				$mdp_salt = md5(md5($password) . $regdate);
				if ($user_exist) 
				{
					$sql = "SELECT *
						FROM " . USERS_TABLE . "
						WHERE LOWER(user_password) = '$mdp_salt'";
					if( !($res = $db->query($sql)) )
					{
						message_die(__LINE__, __FILE__, $sql);
					}
					$good_mdp = FALSE;
					while ($array = $db->fetcharray($res))
					{
						if ($array['user_password'] == $mdp_salt)
						{
							$good_mdp = TRUE;
							$userdata = $array;
						}
					}
	
					if ($good_mdp) 
					{
						$time = time();
						$sql = 'INSERT INTO ' . SESSIONS_TABLE . " (session_id, session_user_id, session_time, user_login)
										VALUES ('$session_id', '$user_id', '$time', '1');";
						if( !($db->query($sql)) )
						{
							message_die(__LINE__, __FILE__, $sql);
						} else {
							error_message($lang['Message'], sprintf($lang['Connexion_good'], $pseudo));
						}
					}
					else
					{
						error_message($lang['Message'], $lang['Bad_mdp'], LOGIN_URL);
					}
				
				} 
				else 
				{
					error_message($lang['Message'], sprintf($lang['Username_no_exist'], $pseudo), LOGIN_URL);
				}
			}
		}
	} else {

		$template->assign('S_LOGIN_ACTION', './' . LOGIN_PAGE . '.'.$phpEx);
		$template->assign('L_ENTER_PASSWORD', $lang['Login_text']);
		$template->assign('L_USERNAME', $lang['Username']);
		$template->assign('L_PASSWORD', $lang['Password']);
		$template->assign('L_LOGIN', $lang['Se_connecter']);
	
		$template->display('login.tpl');
	}
}

include('./includes/page_footer.' . $phpEx);
?>
