<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 10/26/15
 * Time: 2:57 PM
 */
namespace Controller;
use Model\User as User;
use Model\Comment as Comment;
use Model\ViewFactory as ViewFactory;


class MemberController
{
    public function memberAction()
    {

$newUser= new User();
$newComment = new Comment();


$resultMember = $newUser->getActiveUser();
$members = array();
foreach ($resultMember as $member) {
    $numberPosts = $newComment->countComments($member['UserId']);
    $member['NumberPosts'] = $numberPosts;
$members[] = $member;

}
        $viewVars = array(
            'members' => $members,
        );

        $viewFactory = new ViewFactory();
        $viewModel = $viewFactory->create($_GET['Template']);
        $viewModel->addVariables($viewVars);

        return $viewModel;

    }
}