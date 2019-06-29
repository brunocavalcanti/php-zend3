<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Atendimento;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Form\View\Helper\Form;
use Zend\Form\View\Helper\FormCollection;
use Zend\Form\View\Helper\FormRow;
use Zend\Form\View\Helper\FormLabel;
use Zend\Form\View\Helper\FormElement;
use Zend\Form\View\Helper\FormElementErrors;
use Zend\Form\View\Helper\FormText;
use Zend\Form\View\Helper\FormEmail;
use Zend\Form\View\Helper\FormNumber;
use Zend\Form\View\Helper\FormSubmit;
return [
    'router' => [
        'routes' => [
            'atendimento' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/atendimento[/:controller[/:action]]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'aliases' => [
            'solicitante' => Controller\SolicitanteController::class
        ],
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\SolicitanteController::class => SolicitanteControllerFactory::class
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'atendimento/index/index' => __DIR__ . '/../view/atendimento/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
    ],
    'view_helpers' => [
        'aliases' => [
            'form' => Form::class,
            'formCollection' => FormCollection::class,
            'formrow' => FormRow::class,
            'form_label' => FormLabel::class,
            'form_element' => FormElement::class,
            'form_element_errors' => FormElementErrors::class,
            'formtext' => FormText::class,
            'formemail' => FormEmail::class,
            'formnumber' => FormNumber::class,
            'formsubmit' => FormSubmit::class
        ],
        'factories' => [
            Form::class => InvokableFactory::class,
            FormCollection::class => InvokableFactory::class,
            FormRow::class => InvokableFactory::class,
            FormLabel::class => InvokableFactory::class,
            FormElement::class => InvokableFactory::class,
            FormElementErrors::class => InvokableFactory::class,
            FormText::class => InvokableFactory::class,
            FormEmail::class => InvokableFactory::class,
            FormNumber::class => InvokableFactory::class,
            FormSubmit::class => InvokableFactory::class
        ]
    ],
    'service_manager' => [
        'factories' => [
            'SolicitanteTable' => 'Atendimento\Model\SolicitanteTableFactory'
        ]
    ]
];
