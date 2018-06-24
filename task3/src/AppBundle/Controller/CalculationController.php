<?php

namespace AppBundle\Controller;

use AppBundle\CalculationService;
use AppBundle\Entity\CalculationHistory;
use AppBundle\Form\CalculationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class CalculationController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {

        $form = $this->createForm(CalculationType::class);

        return $this->render('AppBundle:Calculation:index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @Route("/ajax/calculate", name="ajaxCalculate")
     * @return JsonResponse|Response
     */
    public function ajaxCalculation(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $data = json_decode($request->getContent(), true);

        $calculationData = new CalculationHistory();

        $form = $this->createForm(CalculationType::class, $calculationData);
        $form->submit($data);

        if ($form->isValid()) {

            $paymentSchedule = new CalculationService($calculationData, $em);
            $paymentSchedule->generatePaymentScheduleData();

            $em->persist($calculationData);
            $em->flush();

            $json = $paymentSchedule->getScheduleJson();

            return new Response($json);
        }

        return new JsonResponse(['error' => 1]);

    }

}
