<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sotxs Controller
 *
 * @property \App\Model\Table\SotxsTable $Sotxs
 * @method \App\Model\Entity\Sotx[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SotxsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sotxs = $this->paginate($this->Sotxs);

        $this->set(compact('sotxs'));
    }

    /**
     * View method
     *
     * @param string|null $id Sotx id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sotx = $this->Sotxs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sotx'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sotx = $this->Sotxs->newEmptyEntity();
        if ($this->request->is('post')) {
            $sotx = $this->Sotxs->patchEntity($sotx, $this->request->getData());
            if ($this->Sotxs->save($sotx)) {
                $this->Flash->success(__('The sotx has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sotx could not be saved. Please, try again.'));
        }
        $this->set(compact('sotx'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sotx id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sotx = $this->Sotxs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sotx = $this->Sotxs->patchEntity($sotx, $this->request->getData());
            if ($this->Sotxs->save($sotx)) {
                $this->Flash->success(__('The sotx has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sotx could not be saved. Please, try again.'));
        }
        $this->set(compact('sotx'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sotx id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sotx = $this->Sotxs->get($id);
        if ($this->Sotxs->delete($sotx)) {
            $this->Flash->success(__('The sotx has been deleted.'));
        } else {
            $this->Flash->error(__('The sotx could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
