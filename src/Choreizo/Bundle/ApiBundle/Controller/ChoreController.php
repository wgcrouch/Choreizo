<?php
namespace Choreizo\Bundle\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

use Choreizo\Bundle\BaseBundle\Entity\Habitat;
use Choreizo\Bundle\BaseBundle\Entity\User;
use Choreizo\Bundle\BaseBundle\Entity\Chore;
use Choreizo\Bundle\BaseBundle\Entity\Vote;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Choreizo\Bundle\BaseBundle\Form\VoteForm;

/**
 * Test controller for the api
 */
class ChoreController extends FOSRestController
{

    public function getChoresAction(Habitat $habitat)
    {
        return $habitat->getChores();
    }

    public function getMyChoresAction(User $user)
    {
        return $user->getChores();
    }

    public function getChoreAction(Chore $chore)
    {
        return $chore;
    }

    public function getChoreVoteAction(Chore $chore)
    {
        return $chore->getLastVote();
    }

    public function postChoreVotesAction(Chore $chore, Request $request)
    {
        $vote = new Vote();
        $form = $this->createForm(new VoteForm(), $vote);
        $form->bind($request);
        $vote->setChore($chore);
        $user= $this->get('security.context')->getToken()->getUser();
        $vote->setUser($user);
        $vote->setCreated(new \DateTime());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // return $vote;
            $em->persist($vote);
            $em->flush();
            return $vote->getId();
        }
        return $form;
    }
}
