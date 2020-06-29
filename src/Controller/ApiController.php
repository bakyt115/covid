<?php


namespace App\Controller;


use App\Entity\CovidCase;
use App\Repository\CovidCaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{

    /**
     * @param string $id
     * @param CovidCaseRepository $rep
     * @return Response
     *
     * @Route("/check/{id}", name="check_id")
     */
    public function checkId(string $id, CovidCaseRepository $rep): Response{
        $case = $rep->findOneBy(['caseId'=>$id]);
        if($case instanceof CovidCase){
            return new JsonResponse(true);
        }

        return new JsonResponse(false);
    }
}