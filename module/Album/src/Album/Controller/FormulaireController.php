<?php
/**
 * Created by PhpStorm.
 * User: isabela
 * Date: 12/10/15
 * Time: 11:28 AM
 */

namespace Album\Controller;

class FormulaireController extends AbstractActionController
{
    protected $formulaireTable;

    public function indexAction()
    {
        $viewModel = new ViewModel(array(
            'formulaires' => $this->getAlbumTable()->fetchAll(),
        ));
        $viewModel->setTemplate('album/album/index..phtml');
        return $viewModel;
    }

    public function insertAction()
    {

        $form = new FormulaireForm();
        $form->get('submit')->setValue('Insert');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $formulaire = new Formulaire();
            $form->setInputFilter($formulaire->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $formulaire->exchangeArray($form->getData());
                $this->getFormulaireTable()->saveAlbum($formulaire);

                // Redirect to list of albums
                return $this->redirect()->toRoute('Album');
            }
        }
        return array('form' => $form);

    }
    public function getFormulaireTable()
    {
        if (!$this->formulaireTable) {
            $sm = $this->getServiceLocator();
            $this->formulaireTable = $sm->get('Album\Model\FormulaireTable');
        }
        return $this->formulaireTable;
    }

}