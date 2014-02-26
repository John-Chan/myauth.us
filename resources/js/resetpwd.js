
$(function() {
var inputs = new Inputs('#change-settings');
var settings = new ChangePassword('#change-settings', {
passwordFields: [
'#newPassword',
'#newPasswordVerify'
]
});
});