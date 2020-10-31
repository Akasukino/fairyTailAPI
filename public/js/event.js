'use strict';

/**
 *  Fonction des Boutons Secondaires
 *  MasterOfGuilde / page administration
 **/

function onClickEditListCharacter(event) {
    event.preventDefault();
    $('.editSearch').fadeToggle();
}
function onClickToggleButtonSearchEdit(event) {
    event.preventDefault();
    $('.sectionEdit').fadeToggle();
}
function onClickSearchCharacter(event) {
    event.preventDefault();
    $('.searchList').fadeToggle();
}

function onClickEditForm(event) {
    event.preventDefault();
    $('.editForm').fadeToggle();
}
