<?

namespace App\Controllers\visaTracking;

use App\Controllers\BaseController;

/**
 * States
 */
class State extends BaseController
{
	protected $stateModel;

	/**
	 * load Models
	 */   
	public function __construct()
	{
		$this->stateModel = model('App\Models\visaTracking\StateModel');
		$this->countryModel = model('App\Models\visaTracking\CountryModel');
	}

	/**
	 * index method
	 */
	public function index(): string
	{
		$data['params'] = array(
			'rows' => '10',
			'page_no' => '1',
			'sort_by' => 'name',
			'sort_order' => 'asc',
			'keywords' => '',
		);
		$data['countries'] = $this->countryModel->findAll();
		$data['params']['total_states'] = $this->stateModel->countAllStates($data['params']);
		$data['state'] = $this->stateModel->getAllStates($data['params']);
		$data['page'] = array(
			'page_title' => 'states',
			'title' => 'states',
			'js' => ['state'],

		);
		return view('visaTracking/state/states',$data);
		
	}

	/**
	 * index Body method
	 */
	public function indexBody(): string
	{
	    $data['params'] = $this->request->getPost();
        $keywords = isset($data['params']['keywords']) ? $data['params']['keywords'] : '';
 
        $countryId = isset($data['params']['country_id']) ? $data['params']['country_id'] : '';
        $data['params']['total_states'] =  $this->stateModel->countAllStates( $data['params']);

        $data['state'] = $this->stateModel->getAllStates($data['params']);
	    $data['countries'] = $this->countryModel->findAll();
		    return view('visaTracking/state/states_body',$data);
	}

	/**
	 * Add state
	 */
	public function add(): string
	{
		$data['countries'] = $this->countryModel->findAll();
		return view('visaTracking/state/add_state',$data);
	}

	/**
	 * create state
	 */
	public function create(): string
	{
		$rules = [
			'country_id' => ['label' => 'Country','rules'=> 'required'],'name' => ['label' => 'Name','rules' => 'required',
	]];
		if($this->validate($rules)) {
			$data = array(
				'country_id' => $this->request->getPost('country_id'),
				'name' => $this->request->getPost('name'),
			);
			$state_data = $this->stateModel->insert($data);
			return view('template/alert_modal',['msg' => 'state added successfully!']);
		}
		else{
			$data['countries'] = $this->countryModel->findAll();
			return view('visaTracking/state/add_state',$data);
		}
	}

	/**
	 * edit state
	 */
	public function edit(): string 
	{
		$id = $this->request->getGet('id');
		$data['state'] = $this->stateModel->find($id);
		$data['countries'] = $this->countryModel->findAll();
		// $data['st'] = $this->stateModel->find($id);
		return view('visaTracking/state/edit_state',$data);
	}

	/**
	 * update state
	 */
	public function update(): string 
	{
		$id = $this->request->getPost('id');
		$rules = [
			'country_id' => ['label' => 'Country','rules'=> 'required'],'name' => ['label' => 'Name','rules' => 'required',
	]];
		if($this->validate($rules)) {
			$state_data = array(
				'country_id' => $this->request->getPost('country_id'),
				'name' => $this->request->getPost('name'),
			);
			$this->stateModel->update($id,$state_data);
			return view('template/alert_modal',['msg' => 'updated state successfully!']);
		}
		else{
			$id = $this->request->getPost($id);
			$data['countries'] = $this->countryModel->findAll();
			return view('visaTracking/state/edit_state',$data);
		}

	}

	/**
	 * delete state
	 */
	public function delete(): string 
	{
		$id = $this->request->getPost('id');
		if($this->stateModel->delete($id)) {
			return view('template/alert_modal',['msg' => 'state deleted successfully!']);
		}
	}





}