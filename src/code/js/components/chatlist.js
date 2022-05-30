

function getLatestChats(props, count, callback) {
    BaseApp.get(
        `/api/chat/latest/${count}/`
    )
    .then((response) => {
        // Run hook in Axios on GET requests
        props.onGetChats && props.onGetChats(response.data);

        callback && callback(response.data);
    })
    
    .catch((error) => {
        console.log("Fetch Chats Error", error);
    });
}


function getChatsBefore(props, before, count, callback) {
    BaseApp.put(
        `/api/chat/latest/${count}/`,
        { before },
    )

    .then((response) => {
        // Run hook in Axios on GET requests
        props.onGetChats && props.onGetChats(response.data);

        callback && callback(response.data);
    })
    
    .catch((error) => {
        console.log('Fetch Chats Before Error', error);
    });
}

const ChatLoader = props => {
    const useOnScreen = (ref) => {
        const [isIntersecting, setIntersecting] = React.useState(false);
      
        const observer = new React.IntersectionObserver(
            ([entry]) => {
                setIntersecting(entry.isIntersecting);
                if (entry.isIntersecting) {
                    props.onVisible();
                }
            }
        );
      
        React.useEffect(() => {
          observer.observe(ref.current)
          // Remove the observer as soon as the component is unmounted
          return () => { observer.disconnect() }
        }, [])
      
        return isIntersecting
    };
  
    const ref = React.useRef();
    const isVisible = useOnScreen(ref);
    
    return (
        <div ref={ref}>
            <div style={{ textAlign: 'center', backgroundColor: '#e2e2e2', margin: '4px', borderRadius: '4px' }}>
                <LoadingOutlined style={{ fontSize: '21px', padding: '24px' }} />
            </div>
        </div>
    )
};

const interval = 33;

const ChatList = props => {
    const didMountRef = React.useRef(false);
    const [loadChats, setLoadChats] = React.useState(false); // true, false, or loading
    const [hasMoreChats, setHasMoreChats] =  React.useState(true);
    const { conn, chats, setChats, setActiveChat } =  React.useContext(ChatEngineContext);

    const chatList = sortChats(
        chats ? 
        Object.values(chats) : 
        [{}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}, {}]
    );

    React.useEffect(() => {
        if (!didMountRef.current) {
            didMountRef.current = true;

            getLatestChats(
                props, 
                interval, 
                (chats) => {
                    onGetChats(chats);
                    chats.length > 0 && setActiveChat(chats[0].id);
                }
            );
        }
    });

    React.useEffect(() => {
        if (!loadChats || loadChats === "loading") return;
        setLoadChats("loading");

        const chatList = chats !== null ? sortChats(Object.values(chats)) : []
        if (chatList.length > 0) {
            const before = chatList[chatList.length - 1].created
            getChatsBefore(props, before, interval, (chats) => onGetChats(chats));
        }
    }, [loadChats]);

    const sortChats = (chats) => {
        return chats.sort((a, b) => { 
            const aDate = a.last_message && a.last_message.created ? getDateTime(a.last_message.created, props.offset) : getDateTime(a.created, props.offset)
            const bDate = b.last_message && b.last_message.created ? getDateTime(b.last_message.created, props.offset) : getDateTime(b.created, props.offset)
            return new Date(bDate) - new Date(aDate); 
        });
    };

    const onGetChats = (chatList) => {
        setLoadChats(false);
        const oldChats = chats !== null ? chats : {};
        const newChats = _.mapKeys({...chatList}, "id");
        const allChats = {...oldChats, ...newChats};
        setChats(allChats);
        interval > chatList.length && setHasMoreChats(false);
    };

    const renderChats = (chats) => {
        return chats.map((chat, index) => {
            if (!chat) {
                return <div key={`chat_${index}`} />

            } else if (props.renderChatCard) {
                return <div key={`chat_${index}`}>{props.renderChatCard(chat, index)}</div>
                
            } else {
                return (
                    <div 
                        key={`chat_${index}`}
                        onClick={() => props.onChatClick && props.onChatClick(chat.id)}
                    >
                        <ChatCard chat={chat} />
                    </div>
                )
            }
        });
    };

    return (
        <div style={styles.chatListContainer} className = "ce-chat-list">
            <div style={styles.chatsContainer} className = "ce-chats-container">
                { 
                    props.renderNewChatForm ? 
                    props.renderNewChatForm(conn) : 
                    <NewChatForm onClose={props.onClose ? () => props.onClose() : undefined} /> 
                }

                { renderChats(chatList) } 

                { 
                    hasMoreChats && chatList.length > 0 &&
                    <div>
                        <ChatLoader 
                            onVisible={() => !loadChats && setLoadChats(true)} />
                        <div style={{  height: "8px" }} />
                    </div>
                }
            </div>
        </div>
    );
};

const styles={
    chatListContainer: { 
        height: "100%", 
        maxHeight: "100vh", 
        overflow: "scroll", 
        overflowX: "hidden",
        borderRight: "1px solid #afafaf", 
        backgroundColor: "white",
        fontFamily: "Avenir"
    },
    chatsContainer: { 
        width: "100%", 
        height: "100%",
        backgroundColor: "white", 
        borderRadius: "0px 0px 24px 24px"
    }
};

