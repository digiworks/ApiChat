

async function getLatestChats (props, count, callback) {
    var response = await baseApp.get(
        `/api/chat/latest/${count}`
    );
    
    if(response.data){
    	props.onGetChats && props.onGetChats(Object.values(response.data.data));
        callback && callback(Object.values(response.data.data));
    }
    
}


async function getChatsBefore(props, before, count, callback) {
    var response = baseApp.put(
        `/api/chat/latest/${count}`,
        { before },
    );
    if(response.data){
    	props.onGetChats && props.onGetChats(Object.values(response.data.data));
        callback && callback(Object.values(response.data.data));
    }
}

const ChatCard = props => {
    const { chat } = props;
    const { activeChat, setActiveChat } = React.useState(0);

    if (_.isEmpty(chat) || props.loading) return <Loading />;
    

    const extraStyle = activeChat === chat.id ? styles.activeChat : {};
    const otherPerson ="Fabio"; //chat.people.find(person => conn.userName !== person.person.username);
    const title = "Titolo";//chat.is_direct_chat && otherPerson ? otherPerson.person.username : chat.title;
    
    let lastMessage = "App";//htmlToFormattedText(chat.last_message.text);
    if (!lastMessage) {
        lastMessage = chat.last_message.attachments.length > 0 ?
        `${chat.last_message.attachments.length} image${chat.last_message.attachments.length > 1 ? "s" : ""}` :
        "Say hello!";
    }

    function didReadLastMessage(chat) {
        let didReadLastMessage = true;
       
        return didReadLastMessage;
    }

    function daySinceSent(date) {
         return "";
        return getDateTime(date, conn.offset).toString().substr(4, 6);
    }

    return (
        <Boop triggers={["onClick", "onMouseEnter"]} x={3} timing={60} width={"-webkit-fill-available"}>
            <div 
                onClick={() => setActiveChat(chat.id)}
                style={{ ...styles.chatContainer, ...extraStyle }}
                className={`ce-chat-card ${activeChat === chat.id && "ce-active-chat-card"}`}
            >
                <div 
                    style={ styles.titleText }
                    className = "ce-chat-title-text"
                    id={`ce-chat-card-title-${title}`}
                >
                    <div 
                        style={{ 
                            width: !didReadLastMessage(chat) && "calc(100% - 18px)", 
                            overflowX: "hidden", 
                            display: "inline-block" 
                        }}
                    >
                        { title }
                    </div>
                    
                    {
                        !didReadLastMessage(chat) &&
                        <div 
                            className="ce-chat-unread-dot"
                            style={{ 
                                marginTop: "5px",
                                width: "12px",
                                height: "12px",
                                borderRadius: "6px",
                                backgroundColor: "#1890ff",
                                float: "right", 
                                display: "inline-block"
                            }} 
                        />
                    }
                </div>

                <div style={{ width: "100%" }} className = "ce-chat-subtitle">
                    <div style={styles.messageText} className ="ce-chat-subtitle-text ce-chat-subtitle-message">
                        { lastMessage }
                    </div>

                    <div 
                        className="ce-chat-subtitle-text ce-chat-subtitle-date"
                        style={{ ...styles.messageText, ...{ textAlign: "right", width: "25%" } }}
                    >
                        { daySinceSent() }
                    </div>
                </div>
            </div>
        </Boop>
    )
};



const ChatLoader = props => {
    const useOnScreen = (ref) => {
        const [isIntersecting, setIntersecting] = React.useState(false);
      
        const observer = new IntersectionObserver(
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
        }, []);
      
        return isIntersecting
    };
  
    const ref = React.useRef();
    const isVisible = useOnScreen(ref);
    
    return (
        <div ref={ref}>
            <div style={{ textAlign: 'center', backgroundColor: '#e2e2e2', margin: '4px', borderRadius: '4px' }}>
                <Icon style={{ fontSize: '21px', padding: '24px' }} >sync</Icon>
            </div>
        </div>
    )
};

const interval = 33;

const ChatList = props => {
    const didMountRef = React.useRef(false);
    const [loadChats, setLoadChats] = React.useState(false); // true, false, or loading
    const [hasMoreChats, setHasMoreChats] =  React.useState(true);
    const [chats, setChats] =  React.useState({});
    const [activeChat, setActiveChat] = React.useState(0);

    
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

        const chatList = chats !== null ? sortChats(Object.values(chats)) : [];
        if (chatList.length > 0) {
            const before = chatList[chatList.length - 1].created
            getChatsBefore(props, before, interval, (chats) => onGetChats(chats));
        }
    }, [loadChats]);

    

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
    },
    chatContainer: { 
        padding: "16px", 
        paddingBottom: "12px",
        cursor: "pointer"
    },
    titleText: { 
        fontWeight: "500",
        paddingBottom: "4px", 
        whiteSpace: "nowrap", 
        overflow: "hidden" 
    },
    messageText: {
        width: "75%",
        color: "rgba(153, 153, 153, 1)", 
        fontSize: "14px", 
        whiteSpace: "nowrap", 
        overflow: "hidden",
        display: "inline-block"
    },
    activeChat: {
        backgroundColor: "#d9d9d9",
        border: "0px solid white",
        borderRadius: "12px"
    }
};
