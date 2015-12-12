<?php
/**
 * Pluma
 * Vitals frontend
*/

require_once ( dirname ( __FILE__ ) . '/../backend/user.php' );
if ( $_SESSION['language'] == 'fra' ) {
require_once ( dirname ( __FILE__ ) . '/../languages/language_fra.php' );
} else {
require_once ( dirname ( __FILE__ ) . '/../languages/language_eng.php' );
}
session_start();
$user = new user( $_SESSION['plumauser'] );
?>
<html>
    <head>
         <meta charset="utf-8"/>
    </head>
    <body>
        <table>
            <!--<tr><td>Name</td> <td>Adrian Compton</td></tr>
            <tr><td>Date of birth</td> <td>May 14, 2001</td></tr>
            <tr><td>Gender</td> <td>Male</td></tr>
            <tr><td>Race</td><td>Caucasian</td></tr>
            <tr><td>Parent/Legal Guardian   </td><td>Stray T. Compton (father), Auta Compton (mother)</td></tr>
            <tr><td>Student ID</td><td>128947</td></tr>
            <tr><td>GPA</td><td>4.53</td></tr>
            <tr><td>Class Rank</td><td>1/729</td></tr>-->
			<tr>
				<td>Name</td>
				<td><?php echo $user->get_fullname(); ?></td>
			</tr>
			<tr>
				<td>Date of birth</td>
				<td><?php echo $user->get_vitals( 'birth' ); ?></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td><?php echo $translations[$user->get_vitals( 'gender' )]; ?></td>
			</tr>
			<tr>
				<td>Ethnicity</td>
				<td><?php echo $user->get_vitals( 'ethnicity' ); ?></td>
			</tr>
			<tr>
				<td>Parent 1</td>
				<td><?php echo $user->get_vitals( 'parent1' ); ?></td>
			</tr>
			<tr>
				<td>Parent 2</td>
				<td><?php echo $user->get_vitals( 'parent2' ); ?></td>
			</tr>
			<tr>
				<td>Student ID</td>
				<td><?php echo $user->get_vitals( 'school_id' ); ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?php echo $user->get_vitals( 'address' ); ?></td>
			</tr>
			<tr>
				<td>Grade level</td>
				<td><?php echo $user->get_vitals( 'grade' ); ?></td>
			</tr>
			<tr>
				<td>User group</td>
				<td><?php echo $translations[$user->get_group()]; ?></td>
			</tr>
        </table>
    </body>
</html>
