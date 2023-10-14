//
/* 
    SWAL PRE DEFINED ALERTS
*/
//
const deleteSwal = { 
    title: 'Delete this data?',
    text: 'Are you sure you want to delete this data?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ff0000',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
};

const editSwal = { 
    title: 'Edit this data?',
    text: 'Are you sure you want to save this edited data?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ff0000',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
};

const createSwal = { 
    title: 'Create this data?',
    text: 'Are you sure you want to save this newly created data?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ff0000',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
};

const unAdminSwal = { 
    title: 'Removing privilege of this user as "Admin"',
    text: 'Are you sure you want to remove privilege of this user as "Admin"?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ff0000',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
};

const AdminSwal = { 
    title: 'Making this user into "Admin"',
    text: 'Are you sure you want to make this user as "Admin"?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ff0000',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
};

const VerSwal = { 
    title: 'Making this user into "Verified"',
    text: 'Are you sure you want to make this user as "Verified"?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ff0000',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
};

const unVerSwal = { 
    title: 'Making this user into "Unverified"',
    text: 'Are you sure you want to make this user as "Unverified"?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#ff0000',
    confirmButtonText: 'Yes',
    cancelButtonText: 'No',
};

window.swals_alerts = { 
    deleteSwal, 
    editSwal, 
    createSwal,
    unAdminSwal,
    AdminSwal,
    VerSwal,
    unVerSwal,
 };


