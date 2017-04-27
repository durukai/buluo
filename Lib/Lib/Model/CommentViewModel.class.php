<?php
class CommentViewModel extends ViewModel {
	protected $viewFields = array (
		 'Comment'=>array('*'),
		 'User'=>array('userid,username,avatar','_on'=>'Comment.userid = User.userid'),
	);
}
?>