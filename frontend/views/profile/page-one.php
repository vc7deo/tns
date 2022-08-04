<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
if(!$model->isNewRecord){
  $model->languages_known = explode(',', $model->languages_known);
  $model->dob = date('d-m-Y',$model->dob);
}
?>
    <div class="container">
    	<?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>
      <div class="flex-home-reg">
          <div class="row">
              <div class="col-lg-6 col-sm-12">
                   <div class="regPolicy">
            <div class="detailSeprate">
          <h3>Basic Details</h3>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
    'readonly' => true,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-mm-yyyy',
        'todayHighlight' => true,
        'endDate' => "-18y"
    ],
]);?>
      </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-6 col-lg-6">
            <?= $form->field($model, 'height')->textInput() ?>
			</div>
			<div class="col-xs-6 col-lg-6">
            <?= $form->field($model, 'height_unit')->dropDownList(['Ft' => 'Feet','Cm' => 'Centimeter'])->label("&nbsp") ?>
            </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-6 col-lg-6">
            <?= $form->field($model, 'weight')->textInput() ?>
			</div>
			<div class="col-xs-6 col-lg-6">
            <?= $form->field($model, 'weight_unit')->dropDownList(['Kilogram' => 'Kilogram'])->label("&nbsp") ?>
            </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'marital_status')->dropDownList(['Never Married' => 'Never Married', 'Married' => 'Married', 'Widow' => 'Widow' ],['prompt' => 'Select']) ?>
            </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'body_type')->dropDownList(['Slim' => 'Slim', 'Athletic' => 'Athletic', 'Average' => 'Average','Heavy' => 'Heavy'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'physical_status')->dropDownList(['Normal' => 'Normal', 'Physically Challenged' => 'Physically Challenged'],['prompt' => 'Select']) ?>
           </div>
        </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'languages_known')->checkboxList(['Malayalam' => 'Malayalam', 'English' => 'English','Hindi' => 'Hindi','Tamil' => 'Tamil']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'eating_habits')->dropDownList(['Vegetarian' => 'Vegetarian', 'Non Vegetarian' => 'Non Vegetarian', 'Eggetarian' => 'Eggetarian'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'drinking_habits')->dropDownList(['No' => 'No', 'Drink Socially' => 'Drink Socially', 'Yes' => 'Yes'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled Habitsspan">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'smoking_habits')->dropDownList(['No' => 'No', 'Occasionally' => 'Occasionally', 'Yes' => 'Yes'],['prompt' => 'Select']) ?>
           </div>
          </div>

        </div>
        </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                    <div class="regPolicyRight">
            <div class="detailSeprate">
          <h3>Professional Details</h3>
          <div class="row arrageFiled">
   <div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'education')->dropDownList(['Aeronautical Engineering' => 'Aeronautical Engineering', 
'B.Arch' => 'B.Arch',
'BCA' => 'BCA',
'BE' => 'BE',
'B.Plan' => 'B.Plan',
'B.Sc IT/ Computer Science' => 'B.Sc IT/ Computer',
'B.Tech.' => 'B.Tech.',
'Other Bachelor Degree in Engineering / Computers' => 'Other Bachelor Degree in Engineering / Computers',
'B.S.(Engineering)' => 'B.S.(Engineering)',
'M.Arch' => 'M.Arch',
'MCA' => 'MCA',
'ME' => 'ME',
'M.Sc. IT / Computer Science' => 'M.Sc. IT / Computer Science',
'M.S.(Engg.)' => 'M.S.(Engg.)',
'M.Sc. IT / Computer Science' => 'M.Sc. IT / Computer Science',
'M.Tech' => 'M.Tech',
'PGDCA' => 'PGDCA',
'Other Masters Degree in Engineering / Computers' => 'Other Masters Degree in Engineering / Computers',
'Aviation Degree' => 'Aviation Degree',
'B.A.' => 'B.A.',
'B.Com.' => 'B.Com.',
'B.Ed.' => 'B.Ed.',
'BFA' => 'BFA',
'BFT' => 'BFT', 
'BLIS' => 'BLIS',
'B.M.M.' => 'B.M.M.',
'B.Sc.' => 'B.Sc.',
'B.S.W' => 'B.S.W',
'B.Phil.' => 'B.Phil.',
'Other Bachelor Degree in Arts / Science / Commerce' => 'Other Bachelor Degree in Arts / Science / Commerce',
'M.A.' => 'M.A.',
'MCom' => 'MCom',
'M.Ed.' => 'M.Ed.',
'MFA' => 'MFA',
'MLIS' => 'MLIS',
'M.Sc.' => 'M.Sc.',
'M.Phil.' => 'M.Phil.',
'MSW' => 'MSW',
'Other Master Degree in Arts / Science / Commerce' => 'Other Master Degree in Arts / Science / Commerce',
'BBA' => 'BBA',
'BFM (Financial Management)' => 'BFM (Financial Management)',
'BHM (Hotel Management)' => 'BHM (Hotel Management)',
'Other Bachelor Degree in Management' => 'Other Bachelor Degree in Management',
'BHA / BHM (Hospital Administration)' => 'BHA / BHM (Hospital Administration)',
'MBA' => 'MBA',
'MFM (Financial Management)' => 'MFM (Financial Management)',
'MHM  (Hotel Management)' => 'MHM  (Hotel Management)',
'MHRM (Human Resource Management)' => 'MHRM (Human Resource Management)',
'PGDM' => 'PGDM',
'Other Master Degree in Management' => 'Other Master Degree in Management',
'MHA / MHM (Hospital Administration)' => 'MHA / MHM (Hospital Administration)',
'B.A.M.S.' => 'B.A.M.S.',
'BDS' => 'BDS',
'BHMS' => 'BHMS',
'BSMS' => 'BSMS',
'BUMS' => 'BUMS',
'BVSc' => 'BVSc',
'MBBS' => 'MBBS',
'MDS' => 'MDS',
'MD / MS (Medical)' => 'MD / MS (Medical)',
'MVSc' => 'MVSc',
'MCh' => 'MCh',
'DNB' => 'DNB',
'BPharm' => 'BPharm',
'BPT' => 'BPT',
'B.Sc. Nursing' => 'B.Sc. Nursing',
'M.Pharm' => 'M.Pharm',
'MPT' => 'MPT',
'Other Master Degree in Medicine' => 'Other Master Degree in Medicine',
'BGL' => 'BGL',
'B.L.' => 'B.L.',
'LL.B.' => 'LL.B.',
'Other Bachelor Degree in Legal' => 'Other Bachelor Degree in Legal',
'CA' => 'CA',
'CFA (Chartered Financial Analyst)' => 'CFA (Chartered Financial Analyst)',
'CS' => 'CS',
'ICWA' => 'ICWA',
'Other Degree in Finance' => 'Other Degree in Finance',

'IAS' => 'IAS',
'IES' => 'IES',
'IFS' => 'IFS',
'IRS' => 'IRS',
'IPS' => 'IPS',
'Other Degree in Service' => 'Other Degree in Service',
'Ph.D.' => 'Ph.D.',
'DM' => 'DM',
'Postdoctoral fellow' => 'Postdoctoral fellow',
'Fellow of National Board (FNB)' => 'Fellow of National Board (FNB)',
'Diploma' => 'Diploma',
'Polytechnic' => 'Polytechnic',
'Trade School' => 'Trade School',
'Others' => 'Others'],['prompt' => 'Select']) ->label(false);  ?>
			</div>
          </div>
          <div class="row arrageFiled">
   <div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'education_details')->textInput() ?>
			</div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'employed_in')->dropDownList(['Government/PSU' => 'Government/PSU', 
                                                       'Private' => 'Private',
                                                       'Business' => 'Business',
                                                       'Defence' => 'Defence', 
                                                       'Self Employed' => 'Self Employed', 
                                                       'Not working' => 'Not working'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'occupation')->dropDownList(['Not Working' => 'Not Working', 
                                                      'Business Owner / Entrepreneur' => 'Business Owner / Entrepreneur', 
                                                      'Executive' => 'Executive', 
                                                      'Software Professional' => 'Software Professional', 
                                                      'Manager' => 'Manager', 
                                                      'Supervisor' => 'Supervisor', 
                                                      'Officer' => 'Officer', 
                                                      'Engineer - Non IT' => 'Engineer - Non IT', 
                                                      'Technician' => 'Technician',
                                                      'Clerk' => 'Clerk', 
                                                      'Marketing Professional' => 'Marketing Professional', 
                                                      'Human Resources Professional' => 'Human Resources Professional', 
                                                      'Secretary / Front Office' => 'Secretary / Front Office', 
                                                      'Farming Professional' => 'Farming Professional',  
                                                      'Horticulturist' => 'Horticulturist',  
                                                      'Pilot' => 'Pilot',  
                                                      'Air Hostess / Flight Attendant<' => 'Air Hostess / Flight Attendant<',  
                                                      'Airline Professional' => 'Airline Professional',  
                                                      'Architect' => 'Architect',  
                                                      'Interior Designer' => 'Interior Designer',  
                                                      'Chartered Accountant' => 'Chartered Accountant', 
                                                      'Auditor' => 'Auditor', 
                                                      'Banking Professional' => 'Banking Professional', 
                                                      'Financial Accountant' => 'Financial Accountant', 
                                                      'Financial Analyst / Planning' => 'Financial Analyst / Planning', 
                                                      'Investment Professional' => 'Investment Professional', 
                                                      'Fashion Designer' => 'Fashion Designer', 
                                                      'Beautician' => 'Beautician', 
                                                      'Hair Stylist' => 'Hair Stylist',  
                                                      'Jewellery Designer' => 'Jewellery Designer',  
                                                      'Designer (Others)' => 'Designer (Others)', 
                                                      'Makeup Artist' => 'Makeup Artist', 
                                                      'BPO / KPO / ITES Professional' => 'BPO / KPO / ITES Professional', 
                                                      'Customer Service Professional' => 'Customer Service Professional', 
                                                      'Civil Services (IAS / IPS / IRS / IES / IFS)' => 'Civil Services (IAS / IPS / IRS / IES / IFS)', 
                                                      'Consultant' => 'Consultant', 
                                                      'Analyst' => 'Analyst', 
                                                      'Corporate Communication' => 'Corporate Communication', 
                                                      'Corporate Planning' => 'Corporate Planning', 
                                                      'Marketing Professional' => 'Marketing Professional', 
                                                      'Operations Management' => 'Operations Management', 
                                                      'Business Development Professional' => 'Business Development Professional', 
                                                      'Content Writer' => 'Content Writer', 
                                                      'Army' => 'Army', 
                                                      'Navy' => 'Navy', 
                                                      'Defence Services (Others)' => 'Defence Services (Others)', 
                                                      'Paramilitary' => 'Paramilitary', 
                                                      'Professor / Lecturer' => 'Professor / Lecturer',
                                                      'Teaching / Academician' => 'Teaching / Academician', 
                                                      'Education Professional' => 'Education Professional', 
                                                      'Training Professional' => 'Training Professional', 
                                                      'Research Assistant' => 'Research Assistant', 
                                                      'Research Scholar' => 'Research Scholar', 
                                                      'Civil Engineer' => 'Civil Engineer', 
                                                      'Electronics / Telecom Engineer' => 'Electronics / Telecom Engineer', 
                                                      'Mechanical / Production Engineer' => 'Mechanical / Production Engineer', 
                                                      'Quality Assurance Engineer - Non IT' => 'Quality Assurance Engineer - Non IT', 
                                                      'Engineer - Non IT' => 'Engineer - Non IT', 
                                                      'Product Manager - Non IT' => 'Product Manager - Non IT', 
                                                      'Project Manager - Non IT' => 'Project Manager - Non IT', 
                                                      'Hotel / Hospitality Professional' => 'Hotel / Hospitality Professional', 
                                                      'Restaurant / Catering Professional' => 'Restaurant / Catering Professional', 
                                                      'Chef / Cook' => 'Chef / Cook', 
                                                      'Software Professional' => 'Software Professional', 
                                                      'Hardware Professional' => 'Hardware Professional', 
                                                      'Product Manager' => 'Product Manager', 
                                                      'Project Manager' => 'Project Manager', 
                                                      'Program Manager' => 'Program Manager', 
                                                      'Animator' => 'Animator', 
                                                      'Cyber / Network Security' => 'Cyber / Network Security', 
                                                      'UI / UX Designer' => 'UI / UX Designer', 
                                                      'Web / Graphic Designer' => 'Web / Graphic Designer', 
                                                      'Software Consultant' => 'Software Consultant', 
                                                      'Data Analyst' => 'Data Analyst', 
                                                      'Data Scientist' => 'Data Scientist', 
                                                      'Network Engineer' => 'Network Engineer', 
                                                      'Quality Assurance Engineer' => 'Quality Assurance Engineer', 
                                                      'Lawyer &amp; Legal Professional' => 'Lawyer &amp; Legal Professional', 
                                                      'Legal Assistant' => 'Legal Assistant',
                                                      'Law Enforcement Officer' => 'Law Enforcement Officer',
                                                      'Police' => 'Police',
                                                      'Healthcare Professional' => 'Healthcare Professional',
                                                      'Paramedical Professional' => 'Paramedical Professional',
                                                      'Nurse' => 'Nurse',
                                                      'Pharmacist' => 'Pharmacist',
                                                      'Physiotherapist' => 'Physiotherapist',
                                                      'Psychologist' => 'Psychologist',
                                                      'Therapist' => 'Therapist',
                                                      'Medical Transcriptionist' => 'Medical Transcriptionist',
                                                      'Dietician / Nutritionist' => 'Dietician / Nutritionist',
                                                      'Lab Technician' => 'Lab Technician',
                                                      'Medical Representative' => 'Medical Representative',
                                                      'Journalist' => 'Journalist',
                                                      'Media Professional' => 'Media Professional',
                                                      'Entertainment Professional' => 'Entertainment Professional',
                                                      'Event Management Professional' => 'Event Management Professional',
                                                      'Advertising / PR Professional' => 'Advertising / PR Professional',
                                                      'Actor / Model' => 'Actor / Model',
                                                      'Artist' => 'Artist',
                                                      'Mariner / Merchant Navy' => 'Mariner / Merchant Navy',
                                                      'Sailor' => 'Sailor',
                                                      'Scientist / Researcher' => 'Scientist / Researcher',
                                                      'CXO / President, Director, Chairman' => 'CXO / President, Director, Chairman',
                                                      'VP / AVP / GM / DGM / AGM' => 'VP / AVP / GM / DGM / AGM',
                                                      'Arts &amp; Craftsman' => 'Arts &amp; Craftsman',
                                                      'Student' => 'Student',
                                                      'Retired' => 'Retired',
                                                      'Transportation / Logistics Professional' => 'Transportation / Logistics Professional',
                                                      'Agent / Broker / Trader' => 'Agent / Broker / Trader',
                                                      'Contractor' => 'Contractor',
                                                      'Fitness Professional' => 'Fitness Professional',
                                                      'Security Professional' => 'Security Professional',
                                                      'Social Worker /  Volunteer / NGO' => 'Social Worker /  Volunteer / NGO',
                                                      'Sportsperson' => 'Sportsperson',
                                                      'Travel Professional' => 'Travel Professional',
                                                      'Singer' => 'Singer',
                                                      'Writer' => 'Writer',
                                                      'Politician' => 'Politician',
                                                      'Associate' => 'Associate',
                                                      'Builder' => 'Builder',
                                                      'Chemist' => 'Chemist',
                                                      'CNC Operator' => 'CNC Operator',
                                                      'Distributor' => 'Distributor',
                                                      'Freelancer' => 'Freelancer',
                                                      'Driver' => 'Driver',
                                                      'Mechanic' => 'Mechanic',
                                                      'Musician' => 'Musician',
                                                      'Photo / Videographer' => 'Photo / Videographer',
                                                      'Surveyor' => 'Surveyor',
                                                      'Tailor' => 'Tailor',
                                                      'Doctor' => 'Doctor',
                                                      'Dentist' => 'Dentist',
                                                      'Surgeon' => 'Surgeon',
                                                      'Veterinary Doctor' => 'Veterinary Doctor',
                                                      'Others' => 'Others'],['prompt' => 'Select']) ?>

           </div>
          </div>
          <div class="row arrageFiled">
   <!--<div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'occupation_details')->textInput() ?>
			</div>-->
          </div>

          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'income')->dropDownList(['0 - 1 Lakh' => '0 - 1 Lakh',
                                                  '1 - 2 Lakh' => '1 - 2 Lakh', 
                                                  '2 - 3 Lakh' => '2 - 3 Lakh', 
                                                  '3 - 4 Lakh' => '3 - 4 Lakh', 
                                                  '4 - 5 Lakh' => '4 - 5 Lakh', 
                                                  '5 - 6 Lakh' => '5 - 6 Lakh', 
                                                  '6 - 7 Lakh' => '6 - 7 Lakh', 
                                                  '7 - 8 Lakh' => '7 - 8 Lakh', 
                                                  '8 - 9 Lakh' => '8 - 9 Lakh', 
                                                  '9 - 10 Lakh' => '9 - 10 Lakh', 
                                                  '10 - 15 Lakh' => '10 - 15 Lakh', 
                                                  '15 - 20 Lakh' => '15 - 20 Lakh',
                                                  '20 - 30 Lakh' => '20 - 30 Lakh',
                                                  '30 - 40 Lakh' => '30 - 40 Lakh', 
                                                  '40 - 50 Lakh' => '40 - 50 Lakh', 
                                                  '50 - 90 Lakh' => '50 - 90 Lakh', 
                                                  'above 90 Lakh' => 'above 90 Lakh'],['prompt' => 'Select']) ?>
           </div>
          </div>
         
            <h3>Religious Information</h3>
                                    <div class="row arrageFiled">
   <div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'religion')->dropDownList(['Hindu' => 'Hindu']) ?>
      </div>
          </div>
                    <div class="row arrageFiled">
   <div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'caste')->dropDownList(['Nair' => 'Nair']) ?>
      </div>
          </div>
          <div class="row arrageFiled">

            	<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'sub_caste')->dropDownList(['Adiyodi'      => 'Adiyodi', 
                                                     'Anthur Nair'  => 'Anthur Nair', 
                                                     'Illam'        => 'Illam',
                                                     'Kaimal'       => 'Kaimal',
                                                     'Kartha'       => 'Kartha', 
                                                     'Kiryathil'    => 'Kiryathil', 
                                                     'Kurup'        => 'Kurup',
                                                     'Maniyani'     => 'Maniyani', 
                                                     'Tharakan'     => 'Tharakan', 
                                                     'Mannadiar'    => 'Mannadiar',
                                                     'Marar'        => 'Marar', 
                                                     'Menon'        => 'Menon', 
                                                     'Nair'         => 'Nair',
                                                     'Nambiar Nair' => 'Nambiar Nair', 
                                                     'Panicker'     => 'Panicker', 
                                                     'Pillai'       => 'Pillai',
                                                     'Poduval'      => 'Poduval', 
                                                     'Thampi'       => 'Thampi', 
                                                     'Unnithan'     => 'Unnithan',
                                                     'Vaniya Nair'  => 'Vaniya Nair',
                                                     'Veluthedath Nair'     => 'Veluthedath Nair',
                                                     'Vilakithala Nair'     => 'Vilakithala Nair',
                                                     'Vellala Pillai'       => 'Vellala Pillai',
                                                     'Chakkala Nair'        => 'Chakkala Nair',
                                                     'Other'                => 'Other'],
                                                     ['prompt' => 'Select']) ?>
            </div>
        </div>
                  <div class="row arrageFiled">
   <div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'other')->textInput() ?>
      </div>
          </div>
            <div class="row arrageFiled">
            	<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'star')->dropDownList(['Aswathi' => 'Aswathi', 
                                                'Bharani' => 'Bharani', 
                                                'Karthika' => 'Karthika', 
                                                'Rohini' => 'Rohini',
                                                'Makayiram' => 'Makayiram',
                                                'Thiruvathira' => 'Thiruvathira',
                                                'Punartham' => 'Punartham',
                                                'Pooyam' => 'Pooyam',
                                                'Aayilyam' => 'Aayilyam',
                                                'Makam'=> 'Makam',
                                                'Pooram' => 'Pooram',
                                                'Uthram' => 'Uthram',
                                                'Atham' => 'Atham',
                                                'Chithira' => 'Chithira',
                                                'Chothi' => 'Chothi',
                                                'Vishakam' => 'Vishakam',
                                                'Anizham' => 'Anizham',
                                                'Thrikketta' => 'Thrikketta',
                                                'Moolam' => 'Moolam',
                                                'Pooradam' => 'Pooradam',
                                                'Uthradam' => 'Uthradam',
                                                'Thiruvonam' => 'Thiruvonam',
                                                'Avittam' => 'Avittam',
                                                'Chathayam' => 'Chathayam',
                                                'Pooruruthathi' => 'Pooruruthathi',
                                                'Uthrattathi' => 'Uthrattathi',
                                                'Revathi' => 'Revathi'],
                                                ['prompt' => 'Select']) ?>
            </div>
        </div>
            <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'rasi')->dropDownList(['Chingam' => 'Chingam', 
                                                'Kanni' => 'Kanni', 
                                                'Thulam' => 'Thulam',
                                                'Vrischikam' => 'Vrischikam', 
                                                'Dhanu' => 'Dhanu', 
                                                'Makaram' => 'Makaram',
                                                'Kumbham' => 'Kumbham', 
                                                'Meenam' => 'Meenam', 
                                                'Medam' => 'Medam',
                                                'Edavam' => 'Edavam', 
                                                'Mithunam' => 'Mithunam', 
                                                'Karkidakam' => 'Karkidakam'],
                                                ['prompt' => 'Select']) ?>
            </div>
            </div>
  
            <div class="row arrageFiled">
            	<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'sudha_jathakam')->radioList([0 => 'No', 1 => 'Yes']) ?>
            </div>
        </div>
            <div class="row arrageFiled">
              <div class="col-xs-12 col-lg-12">
		<?= $form->field($model, 'gothram')->textInput() ?>              
		</div>
            </div>

          </div>
        
        </div>
              </div>
          </div>


      </div>
      <div class="saveButtonsReg">
<?= Html::submitButton('Continue', ['class' => 'savebtns', 'name' => 'login-button']) ?>

      </div>
      <?php ActiveForm::end(); ?>
    </div>