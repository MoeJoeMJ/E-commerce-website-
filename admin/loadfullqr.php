<?php
	$RegisterNumber = $_GET['RegisterNumber'];
	$str_data = "";
	
	include("dbcon.php");
	$query1 = "select * from tabStudents where RollNumber='$RegisterNumber'";
	$result1 = mysql_query($query1, $con);
	$record1 = mysql_fetch_array($result1);
	
	$StudentName = $record1[1];
	$Gender = $record1[2];
	$CourseID = $record1[3];
	$Year = $record1[4];
	$FatherName = $record1[5];
	$FatherMobile = $record1[6];
	$FatherOcc = $record1[7];
	$MotherName = $record1[8];
	$MotherMobile = $record1[9];
	$MotherOcc = $record1[10];
	$BloodGroup = $record1[11];
	$Add1 = $record1[12];
	$Add2 = $record1[13];
	$Add3 = $record1[14];
	$AnnualIncome = $record1[15];
	$SSLC = $record1[16];
	$HSC = $record1[17];
	$EmailID = $record1[18];
	
	$query2 = "select CourseName from tabCourses where CourseID='$CourseID'";
	$result2 = mysql_query($query2, $con);
	$record2 = mysql_fetch_array($result2);
	$CourseName = $record2[0];
	
	$str_data .= "<html><body><h1>Student Information</h1>";
	$str_data .= "<ol>";
	$str_data .= "<li>Name: " . $StudentName . "</li>";
	$str_data .= "<li>Gender: " . $Gender . "</li>";
	$str_data .= "<li>Course: " . $CourseName . "</li>";
	$str_data .= "<li>Year: " . $Year . "</li>";
	
	$str_data .= "<li>Father Name: " . $FatherName . "</li>";
	$str_data .= "<li>Father Mobile: " . $FatherMobile . "</li>";
	$str_data .= "<li>Father Occupation: " . $FatherOcc . "</li>";
	
	$str_data .= "<li>MotherName Name: " . $MotherName . "</li>";
	$str_data .= "<li>Mother Mobile: " . $MotherMobile . "</li>";
	$str_data .= "<li>Mother Occupation: " . $MotherOcc . "</li>";
	
	$str_data .= "<li>Blood Group: " . $BloodGroup . "</li>";
	$str_data .= "<li>Address Line 1: " . $Add1 . "</li>";
	$str_data .= "<li>Address Line 2: " . $Add2 . "</li>";
	$str_data .= "<li>Address Line 3: " . $Add3 . "</li>";
	
	$str_data .= "<li>Income: " . $AnnualIncome . "</li>";
	$str_data .= "<li>SSLC: " . $SSLC . "</li>";
	$str_data .= "<li>HSC: " . $HSC . "</li>";
	$str_data .= "<li>Email ID: " . $EmailID . "</li>";
	$str_data .= "</ol>";
	
	$query3 = "select * from tabAttendance where RegisterNumber='$RegisterNumber'";
	$result3 = mysql_query($query3, $con);
	if (mysql_num_rows($result3)>0)
	{
		$str_data .= "<h1>Attendance</h1>";
		$str_data .= "<ol>";
		while ($record3 = mysql_fetch_array($result3))
		{
			$str_data .= "<li>Semester " . $record3[2] . ": " . $record3[3] . '</li>';
		}
		$str_data .= "</ol>";
	}
	
	$query4 = "select * from tabCGPA where RegisterNumber='" . $RegisterNumber . "'";
	$result4 = mysql_query($query4, $con);
	if (mysql_num_rows($result4)>0)
	{
		$record4 = mysql_fetch_array($result4);
		$str_data .= '<p>CGPA: ' . $record4[2] . '</p>';
	}
	else
	{
		$str_data .= '<p>CGPA Information not available.</p>';
	}
	
	$query5 = "select * from tabEC where RegisterNumber='" . $RegisterNumber . "'";
	$result5 = mysql_query($query5, $con);
	if (mysql_num_rows($result5)>0)
	{
		$record5 = mysql_fetch_array($result5);
		$str_data .= '<p>Extra Curricular Activity: ' . $record5 [2] . '</p>';
	}
	else
	{
		$str_data .= '<p>Extra Curricular Information not available.</p>';
	}
	
	$query6 = "select * from tabClub where RegisterNumber='" . $RegisterNumber . "'";
	$result6 = mysql_query($query6, $con);
	if (mysql_num_rows($result6)>0)
	{
		$record6 = mysql_fetch_array($result6);
		$str_data .= '<p>Club Activity: ' . $record6 [2] . '</p>';
	}
	else
	{
		$str_data .= '<p>Club Activity Information not available.</p>';
	}
	
	$query7 = "select * from tabExam where RegisterNumber='$RegisterNumber'";
	$result7 = mysql_query($query7, $con);
	if (mysql_num_rows($result7)>0)
	{
		$str_data .= "<h1>Online Exam</h1>";
		$str_data .= "<ol>";
		while ($record7 = mysql_fetch_array($result7))
		{
			$str_data .= "<li>" . $record7[2] . '</li>';
		}
		$str_data .= "</ol>";
	}
	
	$str_data .= "</body></html>";
	echo '<img src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=' . $str_data . '&choe=UTF-8" title="Student Information" />'

?>