<?php
namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use symfony\component\form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use symfony\component\routing\annotation\route;


class TaskController extends AbstractController
{
        /**
        * @Route("/form")
        */
    public function new()
    {
        $task = new Task();
        $task->setTask('write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createForm(TaskType::class,$task);

        return $this->render('task/new.html.twig',['form'=>$form->createView(),]);

    }
}