@extends('layouts.app')
@section('content')
<div id="react-app">

</div>
@endsection
@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/react@17/umd/react.development.min.js"  crossorigin></script>
<script src="https://cdn.jsdelivr.net/npm/react@17/umd/react-dom.development.js" crossorigin></script>
<script src="https://cdn.jsdelivr.net/npm/react-easy-edit@1.15.0/build/react-easy-edit.min.js" crossorigin></script>
<script type="text/javascript" src="https://unpkg.com/babel-standalone@6/babel.js"></script>
<script type="text/babel">
    // Define a component called Greetings
    
  function Greetings() {
    const save = (value) => {alert(value)}
  const cancel = () => {alert("Cancelled")}
    return (<div className="invoic_section list_hr">
    <ul className="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li className="nav-item" role="presentation">
        <button className="nav-link active" id="pills-basicIntake-tab" data-bs-toggle="pill" data-bs-target="#pills-VenueCounty" type="button" role="tab" aria-controls="pills-VenueCounty" aria-selected="true">
          Basic Intake
        </button>
      </li>
      <li className="nav-item " role="presentation">
        <button className="nav-link filling-info-tab" id="pills-ProviderInformation-tab" data-bs-toggle="pill" data-bs-target="#pills-fillingInfo" type="button" role="tab" aria-controls="pills-ProviderInformation" aria-selected="false">
          Filing Info
        </button>
      </li>
      <li className="nav-item" role="presentation">
        <button className="nav-link settlement-info-tab" id="pills-settlement-tab" data-bs-toggle="pill" data-bs-target="#pills-settlementInfo" type="button" role="tab" aria-controls="pills-settlement" aria-selected="true">
          Settelment Judg't
        </button>
      </li>
    </ul>

    <div className="tab-content" id="pills-tabContent">

      <div className="tab-pane fade show active" id="pills-VenueCounty" role="tabpanel" aria-labelledby="pills-VenueCounty-tab">
        <div className="kfnythemes_table basic-intake-render mt-4">
          <div className="kfnythemes_modal">
            <div className="card">
              <div className="card-header">
                <h5 className="card-title"> Basic Intake</h5>
              </div>
              <div className="card-body basicIntake_div">
       
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="tab-pane fade" id="pills-fillingInfo" role="tabpanel" aria-labelledby="pills-fillingInfo-tab">
        <div className="filingInfo_div mt-4">
        </div>
      </div>
      
      <div className="tab-pane fade" id="pills-settlementInfo" role="tabpanel" aria-labelledby="pills-settlementInfo-tab">
        <div className="settlementInfo_div mt-4">
        </div>
      </div>

    </div>
  </div>);
  }

  // Render the component to the DOM
  ReactDOM.render(
    <Greetings />,
    document.getElementById("react-app")
  );
</script>
@endsection