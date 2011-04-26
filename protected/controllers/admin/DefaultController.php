<?php

class DefaultController extends AdminController
{
	public function getMoreAllowRoles() {
		return array(User::ROLE_STAFF);
	}

	public function actionIndex()
	{
		$this->render('index');
	}
}
