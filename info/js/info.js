var dis = document.querySelector('.dis')
headp.onclick = function () {
    dis.style.display = 'block';
}
tui.onclick = function () {
    dis.style.display = 'none';
}
/* 查看大头像 */
var as = document.querySelector('#as')
var see = document.querySelector('.see')
var imgObj = as.children[0]
as.onclick = function () {
    see.style.display = 'block';

    my$("big").src = this.children[0].src;
    my$("big").className = "current";
    return false;
}
see.onclick = function () {
    see.style.display = 'none';
}