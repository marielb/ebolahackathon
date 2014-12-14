#step 1
insert into tblStepMessage
	(stepid, message) values
	(0, 'Please respond with one of the codes to get a diagnosis');

#options for step 1
insert into tblStep 
	(stepid, optionid) values 
	(0, 0), (0,1), (0, 2);

insert into tblOption
	(optionid, nextstep, optiontext) 
	values 
	(0, 1, 'I have a patient who has had direct skin contact with bodily fluids of an ebola patient'), 
	(1, 2,  'I have a patient who is experiencing other symptoms'),
	(2, 3,  'I have a corpse to report');

#step 1-1, I have a patient who has had direct skin contact with bodily fluids of an ebola patient
		insert into tblStepMessage (stepid, message) values 
			(1, 'Does your patient have a fever?(101.5F/38.6C)');
		#options for step 1-1
		insert into tblStep (stepid, optionid)
			values (1, 4), (1, 5);

		insert into tblOption
			(optionid, nextstep, optiontext) 
			values 
			(4, 4, 'Yes'), 
			(5, 5,  'No');

#step 1-2, I have a patient who is experiencing other symptoms
		insert into tblStepMessage (stepid, message) values 
			(2, 'Which of these symptoms is your patient experiencing?');

		#options for step 1-2
		# 1 - Intense Weakness,  2 -Headache, 3-Sore Throat, 4-Internal or External Bleeding, 5-Muscle Pain, 6-Vomiting, 7-Diarrhea
		insert into tblStep (stepid, optionid)
			values (2, 6), (2, 7), (2, 8), (2, 9), (2, 10), (2, 11), (2, 12);

		insert into tblOption
			(optionid, nextstep, optiontext) 
			values 
			(6, 4, 'Intense Weakness'), 
			(7, 4,  'Headache'),
			(8, 4,  'Sore Throat'),
			(9, 4,  'Bleeding'),
			(10, 4,  'Muscle Pain'),
			(11, 4,  'Vomiting'),
			(12, 4,  'Diarrhea');

#step 1-3, I have a corpse to report
		insert into tblStepMessage (stepid, message) values
			(3, 'We will need to send you a burial squad to gather the remains. Please respond to let us know where the body/remains are located');

		#options for step 1-3
		insert into tblStep (stepid, optionid)
			values (3, 13);

		insert into tblOption
			(optionid, nextstep, optiontext) 
			values 
			(13, NULL, 'Please Enter an Address.');
		# END

#step 1-1-4, Does your patient have a fever?(101.5F/38.6C) -- YES
insert into tblStepMessage (stepid, message) values 
	(4, 'We will need for the patient to come into the ETU for an Ebola Test. Do you need an Ebola Ambulance Taxi Voucher?');

#options for step 1-1-4
insert into tblStep
	(stepid, optionid) values 
	(4, 14), (4,15);

insert into tblOption
	(optionid, nextstep, optiontext) 
	values 
	(14, 6, 'Yes'), 
	(15, 7,  'No');

#step 1-1-4, Does your patient have a fever?(101.5F/38.6C) -- NO
insert into tblStepMessage (stepid, message)
	values (5, "Great! The patient seems fine, please keep an outlook for any symptoms.");

insert into tblStepMessage (stepid, message)
	values (6, "Here is an ETU Ambulance Taxi Voucher Number: 34562, Please respond to let us know when the Patient is on their way");

insert into tblStep
	(stepid, optionid) values 
	(6, 15), (6,16);

insert into tblOption
	(optionid, nextstep, optiontext) 
	values 
	(15, 8, 'Yes'), 
	(16, 7,  'No');

insert into tblStepMessage (stepid, message)
	values (7, "It's really important for us to know. Please let us know as soon as possible.");

insert into tblStepMessage (stepid, message)
	values (8, "Thank you. It's really important for us to know.");

