
    $(document).ready(function()
    {
        $('.btnDelete').click(function(e)
        {
            e.preventDefault();
            const deleteId = $(this).closest("tr").find('#Id').val();
            console.log(deleteId);
            swal({
                    title: "Are you sure?",
                    text: "You want to delete this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type:"POST",
                            url:"/Company/delete",
                            data:{  "btnDelete_set" : 1, 
                                    "delete_id": deleteId
                                },
                            success :function(response)
                            {
                                swal("Data deleted successfully.!", 
                                {
                                    icon : "success",
                                }).then((result)=>{
                                    console.log(response);
                                    location.reload();
                                });    
                            }
                        });
                    } 
                });
        })
    });

