
const { useSpring, animated } = ReactSpring;

function useBoop({
    x = 0,
    y = 0,
    rotation = 0,
    scale = 1,
    timing = 150,
    springConfig = {
        tension: 300,
        friction: 10
    },
    width = 'auto'
}) {
    const [isBooped, setIsBooped] = React.useState(false);
    const style = useSpring({
        display: 'inline-block',
        backfaceVisibility: 'hidden',
        transform: isBooped
        ? `translate(${x}px, ${y}px)
            rotate(${rotation}deg)
            scale(${scale})`
        : `translate(0px, 0px)
            rotate(0deg)
            scale(1)`,
        config: springConfig,
        width: width,
    });
    React.useEffect(() => {
        if (!isBooped) { return; }
        const timeoutId = window.setTimeout(() => {
            setIsBooped(false);
        }, timing);
        return () => { window.clearTimeout(timeoutId); };
    }, [isBooped]);
    const trigger = React.useCallback(() => {
        setIsBooped(true);
    }, []);
    return [style, trigger];
}

const Boop = ({ children, triggers=[], ...boopConfig }) => {
  const [style, trigger] = useBoop(boopConfig);

  function isTriggerPresent(trigger) {
    return triggers.indexOf(trigger) !== -1
  }

  return (
    <animated.span 
      style={style}
      onClick ={() => isTriggerPresent('onClick') && trigger()}
      onMouseEnter={() => isTriggerPresent('onMouseEnter') && trigger()} 
      onMouseLeave={() => isTriggerPresent('onMouseLeave') && trigger()} 
    >
      {children}
    </animated.span>
  );
};