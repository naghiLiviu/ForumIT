<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 11/23/15
 * Time: 1:18 PM
 */
namespace Album\Controller;

use Album\Form\RegisterForm;
use \Zend\Debug\Debug as dump;
use Zend\EventManager\EventManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\ArrayObject;
use Zend\View\Model\ViewModel;
use Album\Model\Album;
use Album\Form\AlbumForm;
use Zend\Di\Di;
use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

/**
 * Delegator
 */
//$wrappedBuzzer = new Buzzer();
//$eventManager = new EventManager();
//
//$eventManager->attach('buzz', function () {
//    echo "Stare at the art!\n";
//});
//
//$buzzer = new BuzzDelegator($wrappedBuzzer, $eventManager);
//
//echo $buzzer->buzz();

//dump::dump($eventManager);


class AlbumController extends AbstractActionController
{
    protected $albumTable;

    public function indexAction()
    {
        /**
         * DEPENDENCY INJECTION
         */
//        $arrayUsername = array('username' => 'Lyviu93');
//        $arrayPassword = array('password' => 'Dinamo48');
//        $arrayInjection = array('injectionValue' => 'test');
//        $di = new Di();
//
//        $di->instanceManager()->setParameters('Album\Controller\A', $arrayUsername);
//        $di->instanceManager()->setParameters('Album\Controller\A', $arrayPassword);
//        $di->instanceManager()->setShared('Album\Controller\A', true);
//        $di->instanceManager()->setShared('Album\Controller\B', false);
//        $di->instanceManager()->setShared('Album\Controller\C', false);
//        $di->instanceManager()->setInjections('Album\Controller\A', $arrayInjection);
//        \Zend\Debug\Debug::dump($di->instanceManager()->getConfig('Album\Controller\A'));
//        \Zend\Debug\Debug::dump($di->instanceManager()->getClasses());
//        \Zend\Debug\Debug::dump(get_class_methods(get_class($this->getServiceLocator())));
//        \Zend\Debug\Debug::dump($this->getServiceLocator()->getRegisteredServices());
//        $router = $this->getServiceLocator()->get('router');
//        $router->proprietateTrosnita = 234;
//
//        \Zend\Debug\Debug::dump($this->getServiceLocator()->get('router'));
//        \Zend\Debug\Debug::dump($this->getServiceLocator()->get('httpRouter'));
//        \Zend\Debug\Debug::dump($this->getServiceLocator()->get('consoleRouter'));
//




//        $c = new C(new B(new A('usr', 'password')));
//
//        $c = $di->get('Album\Controller\C');
//        $b = $di->get('Album\Controller\B');
//        $a = $di->get('Album\Controller\A');
//        $getClasses = $di->instanceManager()->getClasses();

//        \Zend\Debug\Debug::dump($getClasses);
//        $c->b->a->username = 'tudor';
//        \Zend\Debug\Debug::dump($b);
//        \Zend\Debug\Debug::dump($c);
//        \Zend\Debug\Debug::dump($a);
        /**
         * @var \Zend\ServiceManager\ServiceManager $serviceLocator
         * SERVICE MANAGER
         */
//        $serviceLocator = $this->getServiceLocator();
//        $serviceLocator->addInitializer('Album\Model\SillyInitializer');
//        $this->getServiceLocator()->setShared('Album\Model\AlbumTable', false);
//        $albumTable = $this->getServiceLocator()->get('Album\Model\AlbumTable');
//        $albumTable->myProperty = 7;
        //dump::dump($this->getServiceLocator()->get('Album\Model\AlbumTable'));
        //dump::dump($serviceLocator->getRegisteredServices());
        //dump::dump($serviceLocator->isShared('Album\Model\AlbumTable'));

        $viewModel = new ViewModel(array(
            'albums' => $this->getAlbumTable()->fetchAll(),
        ));
        $viewModel->setTemplate('album/album/index.phtml');
        return $viewModel;
    }

    public function addAction()
    {

        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getAlbumTable()->saveAlbum($album);

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }
        return array('form' => $form);

    }

    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album', array(
                'action' => 'add'
            ));
        }

        try {
            $album = $this->getAlbumTable()->getAlbum($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('album', array(
                'action' => 'index'
            ));
        }

        $form = new AlbumForm();
        $form->bind($album);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getAlbumTable()->saveAlbum($album);

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }


    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int)$request->getPost('id');
                $this->getAlbumTable()->deleteAlbum($id);
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('album');
        }

        return array(
            'id' => $id,
            'album' => $this->getAlbumTable()->getAlbum($id)
        );
    }
      public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }

    public function registerAction()
    {
//        $captcha = new Element\Captcha('captcha');
        //$captcha->setCaptcha(new Captcha\Dumb());
        //$captcha->setLabel('Please verify you are human');
        $form = new RegisterForm();
        //$form->add($captcha);
//       print_r($captcha);

        $form->get('submit')->setValue('Register');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $data = $this->getRequest()->getPost();
            $newData = clone($data);
            //\Zend\Debug\Debug::dump($data);
            $form->setInputFilter($form->getMyInputFilter());
            //$form->bind($data);
            $form->setData($data);
            //\Zend\Debug\Debug::dump($form->get('date')->getValue());
            //\Zend\Debug\Debug::dump($form->isValid());
            //\Zend\Debug\Debug::dump($form->get('username')->getValue());
//            \Zend\Debug\Debug::dump($data);
            //\Zend\Debug\Debug::dump($form->getData());
            //\Zend\Debug\Debug::dump($form->getMessages());
//                return $this->redirect()->toRoute('album');

        }

        return array('form' => $form);
    }

    public function binding()
    {
        $register = new ArrayObject();
        $register['subject'] = '[Register Form]';
        $register['username'] = 'Type your username here';
        $register['email'] = 'Type your username here';
        $register['password'] = 'Type your password here';
        $register['confirmPassword'] = 'Retype your password here';
        $register['date'] = 'Insert date';


        $form = new AlbumForm();
        $form->bind($register);


        $autoCompleteData = array(
            'username' => 'Lyviu93',
            'email' => 'liviu.naghi93@gmail.com',

        );

        $form->setData($autoCompleteData);
    }


}




