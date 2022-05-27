function IndexPage(props) {

    const style = {
        position: 'absolute',
        top: '50%',
        left: '50%',
        transform: 'translate(-50%, -50%)',
        width: 400,
        bgcolor: 'background.paper',
        border: '2px solid #000',
        boxShadow: 24,
        p: 4,
    };

    const [open, setOpen] = React.useState(false);
    const handleOpen = () => {
        setOpen(true);
    };
    const handleClose = () => {
        setOpen(false);
    };
    return (
            <div>
                <Float>
                    <span> {baseApp.translations().t("save", "dashboard")} </span>
                </Float >
                <Boop triggers={"onMouseEnter"} rotation="90">
                    <span> {baseApp.translations().t("boop", "dashboard")} </span>
                </Boop >
                <Float>
                    <ChatButton value="Add" icon="user-add"  onClick={handleOpen}/>
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

