<?php

namespace App\Controller;

use App\Component\Tree\Context;
use App\Component\Tree\SvgTree;
use App\Form\JsonFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Контроллер для построения древовидной структуры из JSON
 *
 * @author Kirill Shilov
 */
class IndexController extends AbstractController
{
    /**
     * Экшен для показа формы загрузки JSON-файла
     *
     * @param Request $request Request
     *
     * @return Response Response
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(JsonFormType::class);
        $form->handleRequest($request);
        $params = ['jsonForm' => $form->createView()];
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('jsonFile')->getData();
            $json = file_get_contents($file->getPathname());
            $context = new Context(new SvgTree($json));
            $params['tree'] = $context->createTree();
        }

        return $this->render('index.html.twig', $params);
    }
}