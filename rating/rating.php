<?php
include('rt.php');

echo "<TABLE width=95% border=0 align=center cellpadding=0 cellspacing=0 > ";
echo "<form name=f1 action='' method=post>";
//echo "<input type=hidden name=cont_id value='$cont_id'>";
echo "<input type=hidden name=todo value='submit-rating'>";
echo "<tr><td ><INPUT TYPE=RADIO NAME=rone Value=1 onClick='f1.submit()';><img src=images/star.gif>1</td>";
echo "<td><INPUT TYPE=RADIO NAME=rone Value=2 onClick='f1.submit()';><font color=#343423><img src=images/star.gif><img src=images/star.gif>2</font></td>";

echo "<td ><INPUT TYPE=RADIO NAME=rone Value=3 onClick='f1.submit()';><font color=#343432><img src=images/star.gif><img src=images/star.gif><img src=images/star.gif>3</font></td>";

echo "<td ><INPUT TYPE=RADIO NAME=rone Value=4 onClick='f1.submit()';>";
echo "<img src=images/star.gif><img src=images/star.gif><img src=images/star.gif><img src=images/star.gif>4</td>";

echo "<td ><INPUT TYPE=RADIO NAME=rone Value=5 onClick='f1.submit()';><img src=images/star.gif><img src=images/star.gif><img src=images/star.gif><img src=images/star.gif><img src=images/star.gif>5</td></tr>";
echo "<tr><td align=center colspan=5 bgcolor='#f1f1f1'> <INPUT TYPE=SUBMIT value=Vote NAME=Vote>";
echo" </td>	</tr></form></table></center> ";

?>