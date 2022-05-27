
const { useSpring, animated } = ReactSpring;

function useFloat({
    x = 0,
    y = 0,
    rotation = 0,
    scale = 1,
    timing = 150,
    shadowX = 50,
    shadowY = 50,
    shadowBlur = 50,
    shadowColor = "245,245,200",
    springConfig = {
        tension: 40,
        friction: 10
    },
    width = 'auto'
}) {
    const [isBooped, setIsBooped] = React.useState(false);
    const style = useSpring({
        display: 'inline-block',
        backfaceVisibility: 'hidden',
        boxShadow: isBooped 
        ? `${shadowX} ${shadowY} ${shadowBlur} ${shadowBlur} rgba(${shadowColor})` 
        : '0px 0px 0px 0px rgba(223,223,223)',
        transform: isBooped
        ? `translate(${x}px, ${y}px)
            rotate(${rotation}deg)
            scale(${scale})`
        : `translate(0px, 0px)
            rotate(0deg)
            scale(1)`,
        config: springConfig,
        width: width
    });
    React.useEffect(() => {
        if (!isBooped) { return; }
        const timeoutId = window.setTimeout(() => {
            setIsBooped(false);
        }, timing);
        return () => { window.clearTimeout(timeoutId); };
    }, [isBooped]);
    const trigger = React.useCallback(() => {
        console.log("here")
        setIsBooped(true);
    }, []);
    return [style, trigger];
}

const Float = ({ children, triggers=[], ...floatConfig }) => {
  const [style, trigger] = useFloat(floatConfig);

  return (
    <animated.span 
      style = {style}
      onMouseEnter = {trigger} 
    >
      {children}
    </animated.span>
  );
};