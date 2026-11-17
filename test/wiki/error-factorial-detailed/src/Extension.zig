const std = @import("std");

const php = @import("php/root.zig");

pub fn @"call factorial"(_: *@This(), args: struct {
    number: u64,
}) !u64 {
    var result: u64 = 1;
    for (1..args.number + 1) |i| {
        result, const overflow = @mulWithOverflow(result, i);
        if (overflow != 0) return php.failure.report(
            "!{d} would result in a number larger than the maximum value of {}, which is {d}",
            .{ i, u64, std.math.maxInt(u64) },
        );
    }
    return result;
}
