<?php
/**
continuous Deployment in PHP - Written by Ramamoorthy
When GitHub webhooks on a event calls this URL, the request is validated and then deployment will be done.
Deployment will be done only when rules are matched. 
Currently only rule is if commits are made, in a commit comment where deployment is asked, or a Pull is merged then the deployment will be done.
Before deployment, git stash or equivalent will be done.

If --NoDep is added at the end of the last commit's comment, then deployment will not be done.
 Deployment can be asked afterwards by commenting in the commit
**/


$rules = array();
$rules['pull_merged'] = true;
$rules['commits'] = true;
$rules['branch_head'] = "refs/heads/";
$rules['branch_name'] = "feature/dashboard";
$rules['verification_branch_name'] = md5($rules['branch_head'].$rules['branch_name']);
$rules['acceptable_secret'] = hash("sha256", "secret");

$current_branch_local_path = 'D:\Xampp\htdocs\CarePredict\CP-Admin';

echo hash("sha1", "9e56815f5542b00fea73548e14faed1f")."\r\n";

chdir($current_branch_local_path);
echo "HEAD Reset\r\n";
$git_reset = shell_exec("git reset --hard HEAD");
echo "git fetch\r\n";
$git_fetch = shell_exec("git fetch");
echo "git pull\r\n";
$git_pull = shell_exec("git pull origin feature/continuous-deployment");
echo "done";

echo $rules['acceptable_secret']."\r\n";
echo $rules['verification_branch_name'];



Hello
?>
