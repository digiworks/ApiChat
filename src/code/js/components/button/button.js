
class ChatButton extends React.Component {
    state = {
        hovered: false
    }

    render() {
        const { value, icon, theme, style, id, type, onClick } = this.props

        const customStyle = style ? style : {}
        const hoverStyle = this.state.hovered ? styles.hoverButton : {}
        const themeStyle = theme === 'danger' ? styles.dangerButton : styles.button

        return (
            <button 
                id={id}
                type ={type}
                onClick={() => onClick && onClick()}
                onMouseEnter={() => this.setState({ hovered: true })}
                onMouseLeave={() => this.setState({ hovered: false })}
                style={{ ...themeStyle, ...customStyle, ...hoverStyle }}
                className={`ce-primary-button ${theme === 'danger' ? 'ce-danger-button' : ''}`}
            >
                <div style={{
                        display: 'flex',
                        alignItems: 'center',
                        flexWrap: 'wrap'
                }}>
                        { icon === 'plus' && <Icon >add</Icon> }
                        { icon === 'delete'  && <Icon>delete_outline</Icon> }
                        { icon === 'user-add'  && <Icon>person_add</Icon> }
                    <span style={{ paddingLeft: "3px"}}>
                        {value}  
                    </span>
                </div> 
            </button>
        )
    }
}

const styles = {
    button: {
        color: 'white',
        border: 'none',
        outline: 'none',
        height: '36px',
        fontSize: '15px',
        cursor: 'pointer',
        padding: '8px 16px',
        borderRadius: '33px',
        backgroundColor: '#1890ff'
    },
    dangerButton: {
        color: 'red',
        border: 'none',
        outline: 'none',
        height: '36px',
        fontSize: '15px',
        cursor: 'pointer',
        padding: '8px 16px',
        borderRadius: '33px',
        backgroundColor: 'white',
        border: '1px solid red'
    },
    hoverButton: {
        opacity: '0.66',
    }
}

ChatButton.propTypes = {
    value: PropTypes.string,
    onClick: PropTypes.func,
    style: PropTypes.object,
    id: PropTypes.string,
    icon: PropTypes.oneOf([undefined, 'plus', 'delete', 'user-add']),
    theme: PropTypes.oneOf([undefined, 'danger']),
    type: PropTypes.oneOf([undefined, 'submit']) 
}
