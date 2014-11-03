<?php

namespace Stef\BVBundle\Controller;

use Stef\BVBundle\Entity\Enquiry;
use Stef\BVBundle\Form\EnquiryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('StefBVBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('StefBVBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));
    }
}