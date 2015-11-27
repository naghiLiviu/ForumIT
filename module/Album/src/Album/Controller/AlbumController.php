<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 11/23/15
 * Time: 1:18 PM
 */
namespace Album\Controller;

use \Zend\Debug\Debug as dump;
use Zend\EventManager\EventManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\Album;
use Album\Form\AlbumForm;
use Zend\Di\Di;


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
        $arrayUsername = array('username' => 'Lyviu93');
        $arrayPassword = array('password' => 'Dinamo48');

        $di = new Di();

        $di->instanceManager()->setParameters('Album\Controller\A', $arrayUsername);
        $di->instanceManager()->setParameters('Album\Controller\A', $arrayPassword);
        $di->instanceManager()->setShared('Album\Controller\A', false);
        $di->instanceManager()->setShared('Album\Controller\B', false);
//        $di->instanceManager()->

//        $c = new C(new B(new A('usr', 'passwd')));

        $c = $di->get('Album\Controller\C');
        $b = $di->get('Album\Controller\B');
        $a = $di->get('Album\Controller\A');

//        $c->b->a->username = 'tudor';
        \Zend\Debug\Debug::dump($b);
        \Zend\Debug\Debug::dump($c);
        \Zend\Debug\Debug::dump($a);
        /**
         * @var \Zend\ServiceManager\ServiceManager $serviceLocator
         * SERVICE MANAGER
         */
        $serviceLocator = $this->getServiceLocator();
        $serviceLocator->addInitializer('Album\Model\SillyInitializer');
        $this->getServiceLocator()->setShared('Album\Model\AlbumTable', false);
        $albumTable = $this->getServiceLocator()->get('Album\Model\AlbumTable');
        $albumTable->myProperty = 7;
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
}




