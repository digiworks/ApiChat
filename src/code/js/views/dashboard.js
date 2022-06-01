function IndexPage(props) {

    const style = {
        position: "absolute",
        top: "50%",
        left: "50%",
        transform: "translate(-50%, -50%)",
        width: 1024,
        maxHeight: "90vh",
        overflow: "scroll",
        overflowX: "hidden",
        bgcolor: 'background.paper',
        border: '2px solid #000',
        boxShadow: 24,
        p: 4
    };

    const [open, setOpen] = React.useState(false);
    const [waiting, setWaiting] = React.useState(false);
    const handleOpen = () => {
        setOpen(true);
    };
    const handleClose = () => {
        setOpen(false);
    };
    
    const [data, setData] = React.useState([]);
    const [refresh, setRefresh] = React.useState(false);
    const filters = [
        {type: "text", id: "fltName", label:  baseApp.translations().t("name", "dashboard"), value: "", field: "Name" },
        {type: "text", id: "fltsurname", label:  baseApp.translations().t("surname", "dashboard"), value: "", field: "surname" },
        {type: "text", id: "fltemail", label: baseApp.translations().t("email", "dashboard"), value: "", field: "email" }
    ];
    
   const labels = { 
       "Active" : baseApp.translations().t("Active", "dashboard"),
       "Deactivated" : baseApp.translations().t("Deactivated", "dashboard")
    };
    var hd = [
        {text:  baseApp.translations().t("name", "dashboard"), numeric: 0, disablePadding: 0, field: "Name"},
        {text:  baseApp.translations().t("surname", "dashboard"), numeric: 0, disablePadding: 0, field: "surname"},
        {text:  baseApp.translations().t("email", "dashboard"), numeric: 0, disablePadding: 0, field: "email"},
        {text:  baseApp.translations().t("status", "dashboard"), numeric: 0, disablePadding: 0, field: "Status"}
    ];
    
    const columns = [
        {field: "Name"},
        {field: "surname"},
        {field: "email"},
        {field: (row) => { return (row.Status == 1 ? labels.Active : labels.Deactivated); }}
    ];
    
    
    const handleAgree = async () => {
      setOpen(false);
      if(baseApp.isWeb()){
            setWaiting(true);
            var result = await baseApp.fetch(props.apiGateway + "/api/user/delete",data);
            
            if(result.status == "success"){
                 setWaiting(false);
                 setRefresh(true);
             }else{
                 if(result.status == "error")
                 {
                     setWaiting(false);
                 }
             }
              setRefresh(false);
      }
      setData([]);
    };
  
    const actions = [
       {
           icon: 'edit',
           tooltip: 'Edit Index',
           text: '',
           onClick: (event, rowData) => {
               if(baseApp.isWeb()){
                   event.preventDefault();
                   /*setData(rowData);*/
                   setWaiting(true);
                   let path = "/formuser?id=" + rowData.Id;
                   baseApp.redirect(path, props.apiGateway);
               }
           }
       },
       {
           icon: 'delete',
           tooltip: 'Delete Index',
           text: '',
           onClick: (event, rowData) => {
              setData(rowData);
              setOpen(true);
           }
       }
   ];
    
    const createuser = (e) => {
      e.preventDefault();
      setWaiting(true);
      let path = "/formuser";
      baseApp.redirect(path, props.apiGateway);
    };
    
    
    return (
            <div>
                <Backdrop
                    sx={{ color: "#fff", zIndex: (theme) => theme.zIndex.drawer + 1 }}
                    open={waiting}
                >
                    <CircularProgress color="inherit" />
                </Backdrop>
                <Float>
                    <span> {baseApp.translations().t("save", "dashboard")} </span>
                </Float >
                <Boop triggers={"onMouseEnter"} rotation="90">
                    <span> {baseApp.translations().t("boop", "dashboard")} </span>
                </Boop >
                <Float>
                    <ChatButton value={baseApp.translations().t("add", "dashboard")} icon="user-add"  onClick={handleOpen}/>
                </Float >
                <Modal
                    open={open}
                    onClose={handleClose}
                    aria-labelledby="modal-modal-title"
                    aria-describedby="modal-modal-description"
                    >
                    <Box sx={style}>
                        <Typography id="modal-modal-title" variant="h6" component="h2">
                            {baseApp.translations().t("user_list", "dashboard")}
                        </Typography>
                        <Typography id="modal-modal-description" sx={{mt: 2}}>
                            Duis mollis, est non commodo luctus, nisi erat porttitor ligula.
                        </Typography>
                        <DataGridRest
				restUrl = {props.pageParams.userApiGateway + "/api/user/paginate"}
				headers = {hd}
				keyColumn = "Id"
				columns = {columns}
				actions = {actions}
				filterFields = {filters}
				refresh = {refresh}
				orderByHeader = {"Name"}
				orderDirection = {"asc"}
				denseType = {true}
			    />
                        <Stack pt={3} pr={1} direction="row" spacing={2} style={{display: "flex", justifyContent: "flex-end"}}>
                            <Float>
                                <ChatButton value="Close" onClick={handleClose}/>
                            </Float >
                        </Stack>
                    </Box>
                </Modal>
            </div>

            );
}
