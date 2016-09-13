/// current menu highlight
function setCurrentItem(pname)
{
	var ls = $("ul#ul1 li");
	ls.removeClass("current");
	$id = "#"+pname;
	$($id).addClass("current");
}